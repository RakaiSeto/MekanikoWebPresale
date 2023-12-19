<?php

namespace App\Http\Controllers\Qr;

use App\Helpers\ErrorCode;
use App\Http\Controllers\Controller;
use General\GeneralCategoryRequest;
use General\GeneralCountryRequest;
use General\GeneralServiceClient;
use General\GeneralSubCategoryRequest;
use Illuminate\Http\Request;
use Grpc\ChannelCredentials;
use Illuminate\Support\Facades\Log;
use Presales\PresalesServiceClient;
use Presales\PresalesViewRequest;
use SalesActivity\SalesActivityUploadData;
use WebEDC\EDCServiceClient;
use WebEDC\SeeAllTransactionRequest;
use Illuminate\Support\Facades\Auth;
use Presales\PresalesAddData;
use Presales\PresalesAddList;
use Presales\PresalesAddRequest;
use Presales\PresalesByIDViewRequest;
use SalesActivity\SalesActivityCompanyRequest;
use SalesActivity\SalesActivityLoginRequest;
use SalesActivity\SalesActivitySaveDataCategory;
use SalesActivity\SalesActivitySaveDataCompany;
use SalesActivity\SalesActivitySaveDataProfile;
use SalesActivity\SalesActivitySaveRequest;
use SalesActivity\SalesActivitySaveResponse;
use SalesActivity\SalesActivityServiceClient;
use SalesActivity\SalesActivityUploadRequest;

class QrController extends Controller
{

    function showInputPage(Request $request)
    {
        $grpcClient = new GeneralServiceClient(generalGRPCAddress, ['credentials' => ChannelCredentials::createInsecure(),]);

        $categoryList = [];
        $subcatList = [];
        $countryList = [];
        // Prepare the request

        $signinRequest = new GeneralCategoryRequest();
        $signinRequest->setRemoteip($request->ip());
        $signinRequest->setWeburl($request->fullUrl());
        $signinRequest->setLangid('ID');

        list($resultall, $status) = $grpcClient->DoGetCategory($signinRequest)->wait();

        $grpcHitStatus = $status->code;
        Log::debug("Category List grpcHitStatus: ".$grpcHitStatus);

        if ($grpcHitStatus === 0) {
            $respStatus = $resultall->getStatus();
            Log::debug('Category List respStatus: '.$respStatus);

            if ($respStatus == ErrorCode::ErrorSuccess) {
                foreach ($resultall->getResults() as $value) {
                    array_push($categoryList, $value);

                    $subcatWrapper = [];

                    $subcatRequest = new GeneralSubCategoryRequest();
                    $subcatRequest->setRemoteip($request->ip());
                    $subcatRequest->setWeburl($request->fullUrl());
                    $subcatRequest->setLangid('ID');
                    $subcatRequest->setCategoryid($value->getId());

                    list($resultsub, $status) = $grpcClient->DoGetSubCategory($subcatRequest)->wait();

                    $grpcHitStatus = $status->code;
                    Log::debug("Sub Category List grpcHitStatus: ".$grpcHitStatus);

                    if ($grpcHitStatus === 0) {
                        $respStatus = $resultsub->getStatus();
                        Log::debug('Sub Category List respStatus: '.$respStatus);

                        if ($respStatus == ErrorCode::ErrorSuccess) {
                            foreach ($resultsub->getResults() as $value2) {
                                array_push($subcatWrapper, $value2);
                            }
                        } else {
                            Auth::logout();

                            // $request->session()->remove('token');

                            $request->session()->flush();
                            // session_unset();

                            return view('pages.qr.signin')->with('message', 'Failed to get sub cat data. '. $resultall->getDescription());
                        }
                    } else {
                        $request->session()->remove('token');

                        return view('pages.qr.signin')->with('message', 'Failed to Get sub Category data. Server not available. Please try again later');
                    }

                    array_push($subcatList, $subcatWrapper);
                }
            } else {
                Auth::logout();

                // $request->session()->remove('token');

                $request->session()->flush();
                // session_unset();

                return view('pages.qr.signin')->with('message', 'Failed to get all principal data. '. $resultall->getDescription());
            }
        } else {
            $request->session()->remove('token');

            return view('pages.qr.signin')->with('message', 'Failed to Get all Category data. Server not available. Please try again later');
        }

        $signinRequest = new GeneralCountryRequest();
        $signinRequest->setRemoteip($request->ip());
        $signinRequest->setWeburl($request->fullUrl());
        $signinRequest->setLangid('ID');

        list($resultcountry, $status) = $grpcClient->DoGetCountry($signinRequest)->wait();

        $grpcHitStatus = $status->code;
        Log::debug("Country List grpcHitStatus: ".$grpcHitStatus);

        if ($grpcHitStatus === 0) {
            $respStatus = $resultall->getStatus();
            Log::debug('Country List respStatus: '.$respStatus);

            if ($respStatus == ErrorCode::ErrorSuccess) {
                foreach ($resultcountry->getResults() as $value2) {
                    array_push($countryList, $value2);
                }
            } else {
                Auth::logout();

                // $request->session()->remove('token');

                $request->session()->flush();
                // session_unset();

                return view('pages.qr.signin')->with('message', 'Failed to get all country data. '. $resultall->getDescription());
            }
        } else {
            $request->session()->remove('token');

            return view('pages.qr.signin')->with('message', 'Failed to Get all Country data. Server not available. Please try again later');
        }
        

        return view('pages.qr.welcome')->with('cat', $categoryList)->with('subcat', $subcatList)->with('country', $countryList)->with('activityid', $request->session()->get('activityid'));
    }

    function submitCompany(Request $request) {
        $newArray = explode("&", $request->getContent());
        $payloadArray = [];
        foreach ($newArray as $theString) {
            array_push($payloadArray, explode("=", $theString));
        }

        $grpcClient = new SalesActivityServiceClient(webClientGRPCAddress, ['credentials' => ChannelCredentials::createInsecure(),]);

        $signinRequest = new SalesActivitySaveRequest();
        $signinRequest->setSignature($request->session()->get('token'));
        $signinRequest->setRemoteip($request->ip());
        $signinRequest->setWeburl($request->fullUrl());
        $signinRequest->setLangid('ID');
        $signinRequest->setActivityid($request->session()->get('activityid'));
        $signinRequest->setUniqueid($request->session()->get('uniqueid'));
        $signinRequest->setIsdelete(true);

        $grpcRequestList = new SalesActivitySaveDataCompany();
        $grpcRequestList->setBrand($payloadArray[7][1]);
        $grpcRequestList->setCompany($payloadArray[8][1]);
        $grpcRequestList->setAddress($payloadArray[9][1]);
        $grpcRequestList->setCity($payloadArray[10][1]);
        $grpcRequestList->setRegion($payloadArray[11][1]);
        $grpcRequestList->setCountry($payloadArray[12][1]);
        $grpcRequestList->setZipcode($payloadArray[13][1]);
        $grpcRequestList->setEmail($payloadArray[14][1]);
        $grpcRequestList->setPhone($payloadArray[15][1]);
        $grpcRequestList->setFax($payloadArray[16][1]);
        $grpcRequestList->setWebsite($payloadArray[17][1]);

        $grpcRequestList1 = new SalesActivitySaveDataProfile();
        $grpcRequestList1->setFirstname($payloadArray[0][1]);
        $grpcRequestList1->setLastname($payloadArray[1][1]);
        $grpcRequestList1->setEmail($payloadArray[2][1]);
        $grpcRequestList1->setPhone($payloadArray[3][1]);

        $grpcRequestList2 = new SalesActivitySaveDataCategory();
        $grpcRequestList2->setRoleid($payloadArray[4][1]);
        $grpcRequestList2->setCategoryid($payloadArray[5][1]);
        $grpcRequestList2->setSubcategoryid($payloadArray[6][1]);
        $arrTemp1 = [];
        $arrTemp2 = [];
        $arrTemp3 = [];
        array_push($arrTemp1, $grpcRequestList);
        array_push($arrTemp2, $grpcRequestList1);
        array_push($arrTemp3, $grpcRequestList2);
        $signinRequest->setCompany($arrTemp1);
        $signinRequest->setProfile($arrTemp2);
        $signinRequest->setCategory($arrTemp3);

        list($resultall, $status) = $grpcClient->DoSalesActivitySave($signinRequest)->wait();

        $grpcHitStatus = $status->code;
        Log::debug("Add Principal grpcHitStatus: ".$grpcHitStatus);

        if ($grpcHitStatus === 0) {

            $respStatus = $resultall->getStatus();
            Log::debug('Add Principal respStatus: '.$respStatus);

            if ($respStatus == ErrorCode::ErrorSuccess) {
                $request->session()->put('memberid', $resultall->getResults()[0]->getMemberid());
                $request->session()->put('savecompanysuccess', true);
                return http_response_code(200);
            } else {
                $request->session()->put('savecompanysuccess', false);
                $request->session()->put('addcompanyqrerrormessage', $resultall->getDescription());
                log::debug($resultall->getDescription());
                return http_response_code(200);
            }
        } else {
            // Failed to call grpc
            // Remove sessionId from the session
            $request->session()->put('savecompanysuccess', false);
            $request->session()->put('addcompanyqrerrormessage', 'Failed to Add Company data. Server not available. Please try again later');
            return http_response_code(200);
        }
    }

    function doLogin(Request $request) {
        Log::debug('doLogin is called.');

        $request->session()->flush();
        // dd($request->id);

        $grpcClient = new SalesActivityServiceClient(webClientGRPCAddress, ['credentials' => ChannelCredentials::createInsecure(),]);

        // Prepare the request

        $signinRequest = new SalesActivityLoginRequest();
        $signinRequest->setRemoteip($request->ip());
        $signinRequest->setWeburl($request->fullUrl());
        $signinRequest->setLangid('ID');
        $signinRequest->setActivityid($request->id);

        list($result, $status) = $grpcClient->DoSalesActivityLogin($signinRequest)->wait();

        $grpcHitStatus = $status->code;
        Log::debug("Login grpcHitStatus: ".$grpcHitStatus);

        if ($grpcHitStatus === 0) {
            $respStatus = $result->getStatus();
            Log::debug('Login respStatus: '.$respStatus);

            if ($respStatus == ErrorCode::ErrorSuccess) {
                // Call grpc success - set session data
                // dd($result);
                $request->session()->put('langid', 'ID');
                $request->session()->put('token', $result->getResults()[0]->getSignature());
                $request->session()->put('activityid', $result->getResults()[0]->getActivityid());
                $request->session()->put('uniqueid', $result->getResults()[0]->getUniqueid());
                $request->session()->put('activityname', $result->getResults()[0]->getActivityname());
                $request->session()->put('activitylocation', $result->getResults()[0]->getActivitylocation());
                $request->session()->put('activitycity', $result->getResults()[0]->getActivitycity());
                $request->session()->put('activitystart', $result->getResults()[0]->getActivitystart());
                $request->session()->put('activityend', $result->getResults()[0]->getActivityend());
                return redirect("/event" . "/" . $request->id . "/dashboard");
            } else if ($respStatus == ErrorCode::ErrorBadAccount){
                // Remove sessionId from the session
                $request->session()->remove('token');

                return redirect('/event')->with('message', 'Failed to login. Invalid username.');
            } else if ($respStatus == ErrorCode::ErrorBadPassword){
                // Remove sessionId from the session
                $request->session()->remove('token');

                return redirect('/event')->with('message', 'Failed to login. Invalid password.');
            } else {
                $request->session()->remove('token');

                return redirect('/event')->with('message', $result->getDescription());
            }
        } else {
            // Failed to call grpc
            // Remove sessionId from the session
            $request->session()->remove('token');

            return redirect('/event')->with('message', 'Failed to login. Server not available. Please try again later');
        }
    }
    function uploadFile(Request $request) {
        Log::debug('afterPage is called.');
        // dd($request->id);

        return view('pages.qr.upload');
    }

    function NoUploadFile(Request $request) {
        Log::debug('noUpload is called.');
        // dd($request->id);

        $grpcClient = new SalesActivityServiceClient(webClientGRPCAddress, ['credentials' => ChannelCredentials::createInsecure(),]);

        // Prepare the request

        $signinRequest = new SalesActivityUploadRequest();
        $signinRequest->setRemoteip($request->ip());
        $signinRequest->setWeburl($request->fullUrl());
        $signinRequest->setLangid('ID');
        $signinRequest->setActivityid($request->id);
        $signinRequest->setSignature($request->session()->get('token'));
        $signinRequest->setUniqueid($request->session()->get('uniqueid'));

        $signinRequestRepeated = [];
        $theData = new SalesActivityUploadData();
        $theData->setMemberid($request->session()->get('memberid'));
        array_push($signinRequestRepeated, $theData);
        $signinRequest->setData($signinRequestRepeated);

        list($result, $status) = $grpcClient->DoSalesActivityUpload($signinRequest)->wait();

        $grpcHitStatus = $status->code;
        Log::debug("No Upload grpcHitStatus: ".$grpcHitStatus);
        if ($grpcHitStatus === 0) {
            $respStatus = $result->getStatus();
            Log::debug('No Upload respStatus: '.$respStatus);

            if ($respStatus == ErrorCode::ErrorSuccess) {

                $request->session()->flush();

                return redirect('/event')->with('success', "Thank you for registering");

            } else {
                $request->session()->flush();

                return redirect('/event')->with('message', $result->getDescription());
            }
        } else {
            $request->session()->flush();

            return redirect('/event')->with('message', 'Failed to upload data. Server not available. Please try again later');
        }
    }
    function YesUploadFile(Request $request) {
        Log::debug('YesUpload is called.');
        // dd($request->id);

        $grpcClient = new SalesActivityServiceClient(webClientGRPCAddress, ['credentials' => ChannelCredentials::createInsecure(),]);

        // Prepare the request

        $signinRequest = new SalesActivityUploadRequest();
        $signinRequest->setRemoteip($request->ip());
        $signinRequest->setWeburl($request->fullUrl());
        $signinRequest->setLangid('ID');
        $signinRequest->setActivityid($request->id);
        $signinRequest->setSignature($request->session()->get('token'));
        $signinRequest->setUniqueid($request->session()->get('uniqueid'));

        $signinRequestRepeated = [];
        $theData = new SalesActivityUploadData();
        $theData->setMemberid($request->session()->get('memberid'));
        
        $dasarBase64 = $request->input('database64');
        $arrayBase64 = explode(',', $dasarBase64);
        $theData->setBase64($arrayBase64[1]);
        // Log::debug($dasarBase64);

        array_push($signinRequestRepeated, $theData);
        $signinRequest->setData($signinRequestRepeated);

        list($result, $status) = $grpcClient->DoSalesActivityUpload($signinRequest)->wait();

        $grpcHitStatus = $status->code;
        Log::debug("Yes Upload grpcHitStatus: ".$grpcHitStatus);
        if ($grpcHitStatus === 0) {
            $respStatus = $result->getStatus();
            Log::debug('Yes Upload respStatus: '.$respStatus);

            if ($respStatus == ErrorCode::ErrorSuccess) {

                $request->session()->remove('token');

                return redirect('/event')->with('success', "Thank you for registering");

            } else {
                $request->session()->remove('token');

                return redirect('/event')->with('message', $result->getDescription());
            }
        } else {
            $request->session()->remove('token');

            return redirect('/event')->with('message', 'Failed to upload data. Server not available. Please try again later');
        }
    }
}
