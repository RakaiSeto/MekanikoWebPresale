@extends('layout.defaultqr')
@section('title', 'Home')

@section('content')
    <style>
        .wrapper {
            position: relative;
        }
        .the-form {
            position: absolute;
            width:100%; 
            height:75vh;
            opacity: 0;
            z-index: 2;
            background-color: #ddd
        }
        .the-form-front {
            position: absolute;
            width:100%; 
            height:75vh;
            opacity: 1;
            z-index: 2;
            background-color: #ddd
        }
        .tofront {
            animation: tofront 2s forwards;
            animation-timing-function: cubic-bezier(0, 0.22, 0.3, 1.04)
        }
        .fromfront {
            animation-delay: 2s;
            animation: fromfront 2s forwards;
            animation-timing-function: cubic-bezier(0, 0.22, 0.3, 1.04)
        }
        .fromback {
            animation-delay: 2s;
            animation: fromback 3s forwards;
            animation-timing-function: cubic-bezier(0, 0.22, 0.3, 1.04)
        }
        .toback {
            animation: toback 3s forwards;
            animation-timing-function: cubic-bezier(0, 0.22, 0.3, 1.04)
        }
        .highlightnumber {
            animation-delay: 2s;
            animation: highlightnumber 3s forwards;
            animation-timing-function: cubic-bezier(0, 0.22, 0.3, 1.04)
        }
        .removehighlight {
            animation-delay: 2s;
            animation: removehighlight 3s forwards;
            animation-timing-function: cubic-bezier(0, 0.22, 0.3, 1.04)
        }
        .form-control1 {
            display: block;
            width: 100%;
            min-height: 38px;
            padding: 6px 12px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #CED4DA;
            -webkit-appearance: none;
            appearance: none;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            display: block;
            width: $width-100;
            min-height: 45px;
            padding: 6px 0px 6px 6px !important;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.625;
            color: #444444;
            border-radius: 5px;
            background-color: #fff;
            :focus {
                color: #495057;
                background-color: #fff;
                border-color: #ffb984;
                outline: 0;
                box-shadow: 0 0 0 4px rgba(255, 112, 4, 0.25);
                color: #495057;
                background-color: #fff;
                border-color: #ced4da;
                outline: 0;
                box-shadow: none;
            }
            ::placeholder {
                color: #6C757D;
                opacity: 1;
            }
            :disabled {
                background-color: #E9ECEF;
                opacity: 1;
            }
        }

        .form-control2 {
            display: block;
            width: 100%;
            min-height: 38px;
            padding: 6px 12px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #CED4DA;
            -webkit-appearance: none;
            appearance: none;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            display: block;
            width: $width-100;
            min-height: 45px;
            padding: 6px 0px 6px 50px !important;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.625;
            color: #444444;
            border-radius: 5px;
            background-color: #fff;
            :focus {
                color: #495057;
                background-color: #fff;
                border-color: #ffb984;
                outline: 0;
                box-shadow: 0 0 0 4px rgba(255, 112, 4, 0.25);
                color: #495057;
                background-color: #fff;
                border-color: #ced4da;
                outline: 0;
                box-shadow: none;
            }
            ::placeholder {
                color: #6C757D;
                opacity: 1;
            }
            :disabled {
                background-color: #E9ECEF;
                opacity: 1;
            }
        }

        .iti{
            width: 100%
        }

        span.iti__country-name, span.iti__dial-code{
            color: #111;
            display:contents
        }

        @keyframes tofront {
            0% {opacity: 1;}
            99.9% {transform: scale(1.5); opacity: 0;}
            100% {opacity: 0; z-index: 0;}
        }
        @keyframes fromfront {
            from {transform: scale(1.5); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }
        @keyframes fromback {
            from {transform: scale(0.5);opacity: 0;}
            to {transform: scale(1.0); opacity: 1;}
        }
        @keyframes toback {
            0% {transform: scale(1.0); opacity: 1;}
            99.9% {transform: scale(0.5);opacity: 0;}
            100% {opacity: 0; z-index: 0;}
        }
        @keyframes highlightnumber {
            from {opacity: 0.2;}
            to {opacity: 1;}
        }
        @keyframes removehighlight {
            from {opacity: 1;}
            to {opacity: 0.2;}
        }
    </style>
    <div id="mobile-forbidden" class="bg-white d-flex align-items-center justify-content-center d-none" style="width: 100vw; position:absolute; z-index:9999;">
        <h1 class="text-center">Please use mobile device to access this page</h1>
    </div>
    <div class="d-flex mx-auto mx-auto flex-column" style="width:95vw">
        <div class="wrapper text-center me-2 mt-3 mb-2 d-flex justify-content-center">

            <div style="width: 30px; height:30px; color:#666; border:2px solid #666; font:26px Arial; line-height:30px;" id="number1" class=" rounded-circle">1</div>

            <div style="height: 30px; opacity:0.2" id="buffer1">
                <div style="width: 30px; height:1px; border: 2px solid #666; margin-top:14.5px"></div>
            </div>

            <div style="width: 30px; height:30px; color:#666; border:2px solid #666; font:26px Arial; line-height:30px; opacity:0.2" id="number2" class=" rounded-circle">2</div>

            <div style="height: 30px; opacity:0.2" id="buffer2">
                <div style="width: 30px; height:1px; border: 2px solid #666; margin-top:14.5px"></div>
            </div>

            <div style="width: 30px; height:30px; color:#666; border:2px solid #666; font:26px Arial; line-height:30px; opacity:0.2" id="number3" class="rounded-circle">3</div>

            <div style="height: 30px; opacity:0.2" id="buffer3">
                <div style="width: 30px; height:1px; border: 2px solid #666; margin-top:14.5px"></div>
            </div>

            <div style="width: 30px; height:30px; color:#666; border:2px solid #666; font:26px Arial; line-height:30px; opacity:0.2" id="number4" class="rounded-circle">4</div>
        </div>

        <div class="wrapper mt-2">
            <div id="form-4" class="the-form rounded p-4">
                <div style="height:90%; overflow-y:auto; overflow-x:hidden" class="pb-3">
                    <div class="section-title text-center">
                        <h2 class="ec-title mx-auto text-dark p-0">Input your company data</h2>
                    </div>
                    <div class="text-justify">
                        <form>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="exampleInputPassword1" class="form-label m-0">Brand<label for="" style="color: red" class="m-0">*</label></label>
                                  <input autocomplete="false" type="text" class="form-control1" id="brandinput" aria-describedby="firstnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="exampleInputPassword1" class="form-label m-0">Company<label for="" style="color: red" class="m-0">*</label></label>
                                  <input autocomplete="false" type="text" class="form-control1" id="companyinput" aria-describedby="lastnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="exampleInputPassword1" class="form-label m-0">Address<label for="" style="color: red" class="m-0">*</label></label>
                                  <input autocomplete="" type="text" class="form-control1" id="addressinput" aria-describedby="firstnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="exampleInputPassword1" class="form-label m-0">City<label for="" style="color: red" class="m-0">*</label></label>
                                  <input autocomplete="false" type="text" class="form-control1" id="cityinput" aria-describedby="lastnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                  <label for="exampleInputEmail1" class="form-label m-0">Region</label>
                                  <input autocomplete="false" type="text" class="form-control1" id="regioninput" aria-describedby="firstnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="exampleInputPassword1" class="form-label m-0">Country<label for="" style="color: red" class="m-0">*</label></label>
                                    <select class="form-select" id="countryinput" aria-label="Default select example">
                                        <option disabled selected value class="opacity-0"> -- select an option -- </option>
                                        @foreach ($country as $value1)
                                            <option data-filter="{{$value1->getId()}}" class="catname" value="{{$value1->getId()}}">{{$value1->getName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                  <label for="exampleInputEmail1" class="form-label m-0">Zipcode</label>
                                  <input autocomplete="false" type="number" class="form-control1" id="zipcodeinput" aria-describedby="firstnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                  <label for="exampleInputEmail1" class="form-label m-0">Email</label>
                                  <input autocomplete="false" type="email" class="form-control1" id="compemailinput" aria-describedby="lastnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                  <label for="exampleInputEmail1" class="form-label m-0">Phone</label>
                                  <input autocomplete="false" type="tel" class="form-control2" id="compphoneinput" aria-describedby="firstnameinput" style="padding-left: 50px !important">
                                  <span id="valid-msg1" class="d-none"></span>
                                  <div id="error-msg1" class="form-group alert alert-danger d-none text-center"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                  <label for="exampleInputEmail1" class="form-label m-0">Fax</label>
                                  <input autocomplete="false" type="number" class="form-control1" id="compfaxinput" aria-describedby="lastnameinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                  <label for="exampleInputEmail1" class="form-label m-0">Website</label>
                                  <input autocomplete="false" type="url" class="form-control1" id="compwebsiteinput" aria-describedby="firstnameinput">
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="w-100 d-flex justify-content-center">
                    <button class="btn-primary btn mb-4 mt-2 rounded me-1" id="beforebtn-4">before</button>
                    <button class="btn-primary btn mb-4 mt-2 rounded ms-1" disabled id="summarybtn" data-toggle="modal" data-target="#modalSummary">view summary</button>
                </div>
            </div>

            <div id="form-3" class="the-form rounded p-4">
                <div style="height:90%; overflow-y:auto" class="pb-3">
                    <div class="section-title text-center">
                        <h2 class="ec-title mx-auto text-dark p-0">Choose your company category</h2>
                    </div>
                    <div class="text-justify">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label w-100 m-0">Profile Role<label for="" style="color: red" class="m-0">*</label></label>
                                <select class="form-select" aria-label="Default select example" id="roleinput">
                                    <option disabled selected value class="opacity-0"> -- select an option -- </option>
                                    <option value="ROLE005">Principal</option>
                                    <option value="ROLE012">Distributor</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="exampleInputPassword1" class="form-label w-100 m-0">Company Category<label for="" style="color: red" class="m-0">*</label></label>
                                <br>
                                <select class="form-select" onchange="handleClick()" id="catinput" aria-label="Default select example">
                                    <option disabled selected value class="opacity-0"> -- select an option -- </option>
                                    @foreach ($cat as $value1)
                                        <option data-filter="{{$value1->getId()}}" class="catname" value="{{$value1->getId()}}">{{$value1->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="exampleInputPassword1" class="form-label w-100 m-0">Company Subcategory<label for="" style="color: red" class="m-0">*</label></label>
                                <br>
                                <select class="form-select" aria-label="Default select example" id="subcatinput">
                                    {{-- <option disabled selected value> -- select an option -- </option> --}}
                                    @foreach ($subcat as $key1 => $value2)
                                        @foreach ($value2 as $value3)
                                            <option data-type="{{$cat[$key1]->getId()}}" class="subcatname" value="{{$value3->getId()}}">{{$value3->getName()}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="w-100 d-flex justify-content-center">
                    <button class="btn-primary btn mb-4 mt-2 rounded me-1" id="beforebtn-3">before</button>
                    <button class="btn-primary btn mb-4 mt-2 rounded ms-1" disabled id="nextbtn-3">next</button>
                </div>
            </div>

            <div id="form-2" class="the-form rounded p-4">
                <div style="height:90%; overflow-y:auto" class="pb-3">
                    <div class="section-title text-center">
                        <h2 class="ec-title mx-auto text-dark p-0 m-0">Input your personal data</h2>
                    </div>
                    <div class="text-justify">
                        <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label m-0">First Name<label for="" style="color: red" class="m-0">*</label></label>
                              <input type="text" class="form-control1" id="firstnameinput" aria-describedby="firstnameinput">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label m-0">Last Name<label for="" style="color: red" class="m-0">*</label></label>
                              <input type="text" class="form-control1" id="lastnameinput" aria-describedby="lastnameinput">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label m-0">Email address<label for="" style="color: red" class="m-0">*</label></label>
                              <input type="email" class="form-control1" id="emailinput" aria-describedby="emailinput">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label m-0">Phone Number<label for="" style="color: red" class="m-0">*</label></label>
                              <input type="tel" class="form-control2" id="phoneinput" style="padding-left: 50px">
                              <span id="valid-msg2" class="d-none"></span>
                              <div id="error-msg2" class="form-group alert alert-danger d-none text-center"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <button class="btn-primary btn mb-4 rounded me-1" id="beforebtn-2">before</button>
                    <button class="btn-primary btn mb-4 rounded ms-1" disabled id="nextbtn-2">next</button>
                </div>
            </div>

            <div id="form-1" class="the-form-front rounded p-4">
                <div style="height:90%; overflow-y:auto;" class="d-flex flex-column pb-3 justify-content-center">
                    {{-- <div class="section-title text-center">
                        <h2 class="ec-title mx-auto text-dark p-0">Welcome to Mekaniko+</h2>
                    </div> --}}
                    <div class="text-center">
                        <h2 class=" mb-3" style="font-size: 2.5em"><strong>{{session('activityname')}}</strong></h2>
                        @if (session('activitylocation') != "" || session('activitycity') != "")
                            @if (session('activitylocation') != "" && session('activitycity') != "")
                            <h4 class="">{{session('activitylocation')}}, {{session('activitycity')}}</h4>
                            @elseif (session('activitylocation') == "")
                            <h4 class="">{{session('activitycity')}}</h4>
                            @else
                            <h4 class="">{{session('activitylocation')}}</h4>
                            @endif
                        @endif

                        @if (session('activityend') == "")
                        <h4 class="">{{session('activitystart')}}</h4>
                        @elseif (session('activityend') == session('activitystart'))
                        <h4 class="">{{session('activitystart')}}</h4>
                        @else
                        <h4 class="">{{session('activitystart')}} - {{session('activityend')}}</h4>
                        @endif
                    </div>
                    <button class="btn btn-primary rounded mx-auto mt-3" style="height: 30px; line-height:30px" data-toggle="modal" data-target="#modalTNC">Read our terms and condition</button>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <button class="btn-primary btn mb-4 mt-2 rounded ms-1" disabled id="nextbtn-1">next</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade modal-add-contact" style="overflow-y: auto" id="modalTNC" name="modalTNC" tabindex="-1"
role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header px-4 flex-column">
                <h5 class="modal-title" id="exampleModalCenterTitle">Terms and Conditions</h5>
            </div>

            <div class="modal-body px-4">
                <div class="row mb-2">
                    <div class="col-lg-12 text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt quo laboriosam eaque delectus ex vero asperiores libero necessitatibus quidem quibusdam, nemo doloribus praesentium quaerat maiores voluptate, sint aperiam! Illum, aspernatur iure in eos rem hic quia, id perferendis nemo dolores voluptatibus quis neque ea. Accusamus doloribus sapiente aliquam ut quia voluptatum veniam incidunt ratione. Repellat aspernatur placeat dolorum nihil laborum laboriosam corrupti adipisci nisi aliquid! Perspiciatis consequatur veritatis rem cupiditate atque, blanditiis unde eius beatae. Quisquam odio nihil, distinctio nostrum ducimus fugiat ipsam a, repellat provident rem cumque rerum, libero veritatis? Nemo vel dolores accusamus dolorem. Ipsa, similique labore.
                    </div>

                    <div class="col-lg-12 d-flex mt-3">
                        <div class="form-group d-flex align-items-start">
                            <p class="me-1 mb-0">I have read and agree to all Terms and Conditions</p>
                            <input type="checkbox" class="form-check-input position-relative" style="margin-top: 0.25em; margin-left:0" id="agreeTNC" name="agreeTNC">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer px-4">
                <button type="button" class="btn btn-secondary btn-pill"
                data-toggle="modal" data-target="#modalTNC">Close</button>
            </div>
            <input type="hidden" id="activityid" value="{{$activityid}}">
        </div>
    </div>
</div>

<div class="modal fade modal-add-contact" style="overflow-y: auto" id="modalSummary" name="modalTNC" tabindex="-1"
role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header px-4 flex-column">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data Summary</h5>
            </div>

            <div class="modal-body px-4">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <p class="summary-text" id="summaryfirstnameinput">User First Name      : </p>
                        <p class="summary-text" id="summarylastnameinput">User Last Name       : </p>
                        <p class="summary-text" id="summaryemailinput">User Email           : </p>
                        <p class="summary-text" id="summaryphoneinput">User Phone           : </p>
                        <p class="summary-text" id="summaryroleinput">User Role            : </p>
                        <p class="summary-text" id="summarycatinput">Company Category     : </p>
                        <p class="summary-text" id="summarysubcatinput">Company Subcategory  : </p>
                        <p class="summary-text" id="summarybrandinput">Company Brand        : </p>
                        <p class="summary-text" id="summarycompanyinput">Company Name         : </p>
                        <p class="summary-text" id="summaryaddressinput">Company Address      : </p>
                        <p class="summary-text" id="summarycityinput">Company City         : </p>
                        <p class="summary-text" id="summaryregioninput">Company Region       : </p>
                        <p class="summary-text" id="summarycountryinput">Company Country      : </p>
                        <p class="summary-text" id="summaryzipcodeinput">Company Zipcode      : </p>
                        <p class="summary-text" id="summarycompemailinput">Company Email        : </p>
                        <p class="summary-text" id="summarycompphoneinput">Company Phone        : </p>
                        <p class="summary-text" id="summarycompfaxinput">Company Fax          : </p>
                        <p class="summary-text" id="summarycompwebsiteinput">Company Website      : </p>
                    </div>

                    <div class="col-lg-12 d-flex mt-3">
                        <div class="form-group d-flex align-items-start">
                            <p class="me-1 mb-0">I have checked all data about to be submited</p>
                            <input type="checkbox" class="form-check-input position-relative" style="margin-top: 0.25em; margin-left:0" id="agreeSummary" name="agreeTNC">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer px-4">
                <button type="button" class="btn btn-secondary btn-pill rounded"
                data-toggle="modal" data-target="#modalSummary">Close</button>
                <button class="btn-primary btn rounded" disabled id="submitbtn">submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function hasTouchSupport() {
            return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
        }

        // if (hasTouchSupport()) {
        //     document.getElementById('mobile-forbidden').style.display = 'none';
        // } else {
        //     document.getElementById('mobile-forbidden').style.display = 'block';
        //     // alert(window.innerHeight - document.getElementById('header-qr').getBoundingClientRect().height)
        //     document.getElementById('mobile-forbidden').style.height = window.innerHeight - document.getElementById('header-qr').getBoundingClientRect().height + "px";
        // }
    })
    // const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"]; 
    // const phone = document.getElementById("phoneinput");
    // const compphone = document.getElementById("compphoneinput");

    // const iti = window.intlTelInput(phone, {
    //     initialCountry: "auto",
    //     geoIpLookup: callback => {
    //         fetch("https://ipapi.co/json")
    //         .then(res => res.json())
    //         .then(data => callback(data.country_code))
    //         .catch(() => callback("us"));
    //     },
    //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
    //     placeholderNumberType:"MOBILE",
    //     formatOnDisplay: true,
    // });
    // const iti2 = window.intlTelInput(compphone, {
    //     initialCountry: "auto",
    //     geoIpLookup: callback => {
    //         fetch("https://ipapi.co/json")
    //         .then(res => res.json())
    //         .then(data => callback(data.country_code))
    //         .catch(() => callback("us"));
    //     },
    //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
    //     placeholderNumberType:"MOBILE",
    //     formatOnDisplay: true,
    // });
</script>

<script>
    nextbtn = document.getElementById('nextbtn-1');
    nextbtn.addEventListener('click', function() {
        document.getElementById('form-1').classList.remove('fromfront')
        document.getElementById('form-2').classList.remove('toback')
        document.getElementById('form-1').classList.add('tofront')
        document.getElementById('form-2').classList.add('fromback')
        document.getElementById('number2').classList.add('highlightnumber')
        document.getElementById('buffer1').classList.add('highlightnumber')
        document.getElementById('number2').classList.remove('removehighlight')
        document.getElementById('buffer1').classList.remove('removehighlight')
    })
    nextbtn2 = document.getElementById('nextbtn-2');
    nextbtn2.addEventListener('click', function() {
        document.getElementById('form-2').classList.remove('fromfront')
        document.getElementById('form-2').classList.remove('fromback')
        document.getElementById('form-3').classList.remove('toback')
        document.getElementById('form-2').classList.add('tofront')
        document.getElementById('form-3').classList.add('fromback')
        document.getElementById('number3').classList.add('highlightnumber')
        document.getElementById('buffer2').classList.add('highlightnumber')
        document.getElementById('number3').classList.remove('removehighlight')
        document.getElementById('buffer2').classList.remove('removehighlight')
    })
    nextbtn3 = document.getElementById('nextbtn-3');
    nextbtn3.addEventListener('click', function() {
        document.getElementById('form-3').classList.remove('fromfront')
        document.getElementById('form-3').classList.remove('fromback')
        document.getElementById('form-4').classList.remove('toback')
        document.getElementById('form-3').classList.add('tofront')
        document.getElementById('form-4').classList.add('fromback')
        document.getElementById('number4').classList.add('highlightnumber')
        document.getElementById('buffer3').classList.add('highlightnumber')
        document.getElementById('number4').classList.remove('removehighlight')
        document.getElementById('buffer3').classList.remove('removehighlight')
    })

    beforebtn = document.getElementById('beforebtn-2');
    beforebtn.addEventListener('click', function() {
        document.getElementById('form-1').classList.remove('tofront')
        document.getElementById('form-2').classList.remove('fromback')
        document.getElementById('form-1').classList.add('fromfront')
        document.getElementById('form-2').classList.add('toback')
        
        document.getElementById('number2').classList.remove('highlightnumber')
        document.getElementById('buffer1').classList.remove('highlightnumber')
        document.getElementById('number2').classList.add('removehighlight')
        document.getElementById('buffer1').classList.add('removehighlight')
    })
    beforebtn2 = document.getElementById('beforebtn-3');
    beforebtn2.addEventListener('click', function() {
        document.getElementById('form-2').classList.remove('tofront')
        document.getElementById('form-3').classList.remove('fromback')
        document.getElementById('form-2').classList.add('fromfront')
        document.getElementById('form-3').classList.add('toback')
        
        document.getElementById('number3').classList.remove('highlightnumber')
        document.getElementById('buffer2').classList.remove('highlightnumber')
        document.getElementById('number3').classList.add('removehighlight')
        document.getElementById('buffer2').classList.add('removehighlight')
    })
    beforebtn3 = document.getElementById('beforebtn-4');
    beforebtn3.addEventListener('click', function() {
        document.getElementById('form-3').classList.remove('tofront')
        document.getElementById('form-4').classList.remove('fromback')
        document.getElementById('form-3').classList.add('fromfront')
        document.getElementById('form-4').classList.add('toback')
        
        document.getElementById('number4').classList.remove('highlightnumber')
        document.getElementById('buffer3').classList.remove('highlightnumber')
        document.getElementById('number4').classList.add('removehighlight')
        document.getElementById('buffer3').classList.add('removehighlight')
    })
</script>
<script>
    var btnAgree = document.getElementById('agreeTNC');

    btnAgree.addEventListener('click', function() {
        if (this.checked = true) {
            document.getElementById('nextbtn-1').disabled = false;
        } else {
            document.getElementById('nextbtn-1').disabled = true;
        }
    });

    var btnAgreeSummary = document.getElementById('agreeSummary');

    btnAgreeSummary.addEventListener('click', function() {
        if (this.checked = true) {
            document.getElementById('submitbtn').disabled = false;
        } else {
            document.getElementById('submitbtn').disabled = true;
        }
    });

    firstnameinput = document.getElementById('firstnameinput');
    lastnameinput = document.getElementById('lastnameinput');
    emailinput = document.getElementById('emailinput');
    phoneinput = document.getElementById('phoneinput');
    firstnameinput.addEventListener('keyup', function () {
        if (firstnameinput.value.length < 1 || lastnameinput.value.length < 1 || emailinput.value.length < 1 || phoneinput.value.length < 1) {
            document.getElementById('nextbtn-2').disabled = true
        } else {
            document.getElementById('nextbtn-2').disabled = false
        }
    });
    lastnameinput.addEventListener('keyup', function () {
        if (firstnameinput.value.length < 1 || lastnameinput.value.length < 1 || emailinput.value.length < 1 || phoneinput.value.length < 1) {
            document.getElementById('nextbtn-2').disabled = true
        } else {
            document.getElementById('nextbtn-2').disabled = false
        }
    });
    emailinput.addEventListener('keyup', function () {
        if (firstnameinput.value.length < 1 || lastnameinput.value.length < 1 || emailinput.value.length < 1 || phoneinput.value.length < 1) {
            document.getElementById('nextbtn-2').disabled = true
        } else {
            document.getElementById('nextbtn-2').disabled = false
        }
    });
    phoneinput.addEventListener('keyup', function () {
        let errorMsg = document.getElementById("error-msg2");
        let validMsg = document.getElementById("valid-msg2");
        phoneinput.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("d-none");
        validMsg.classList.add("d-none");
        if (phoneinput.value.trim()) {
            console.log(phoneinput.value.trim());
            if (iti.isValidNumber()) {
                validMsg.classList.remove("d-none");
            } else {
                phoneinput.classList.add("error");
                const errorCode = iti.getValidationError();
                if (errorCode != -99) {
                    errorMsg.innerHTML = errorMap[errorCode];
                } else {
                    errorMsg.innerHTML = "Invalid number"
                }
                errorMsg.classList.remove("d-none");
            }
        }
        if (firstnameinput.value.length < 1 || lastnameinput.value.length < 1 || emailinput.value.length < 1 || phoneinput.value.length < 1) {
            document.getElementById('nextbtn-2').disabled = true
        } else {
            document.getElementById('nextbtn-2').disabled = false
        }
    });

    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
    const compphone = document.getElementById("compphoneinput");

    const iti = window.intlTelInput(phoneinput, {
        initialCountry: "auto",
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("us"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        placeholderNumberType:"MOBILE",
        formatOnDisplay: true,
    });
    const iti2 = window.intlTelInput(compphone, {
        initialCountry: "auto",
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("us"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        placeholderNumberType:"MOBILE",
        formatOnDisplay: true,
    });

    compphone.addEventListener('keyup', function () {
        let errorMsg = document.getElementById("error-msg1");
        let validMsg = document.getElementById("valid-msg1");
        compphone.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("d-none");
        validMsg.classList.add("d-none");
        if (compphone.value.trim()) {
            console.log(compphone.value.trim());
            if (iti2.isValidNumber()) {
                validMsg.classList.remove("d-none");
            } else {
                compphone.classList.add("error");
                const errorCode = iti2.getValidationError();
                if (errorCode != -99) {
                    errorMsg.innerHTML = errorMap[errorCode];
                } else {
                    errorMsg.innerHTML = "Invalid number"
                }
                errorMsg.classList.remove("d-none");
            }
        }
        if (firstnameinput.value.length < 1 || lastnameinput.value.length < 1 || emailinput.value.length < 1 || phoneinput.value.length < 1) {
            document.getElementById('nextbtn-2').disabled = true
        } else {
            document.getElementById('nextbtn-2').disabled = false
        }
    });

    roleinput = document.getElementById('roleinput');
    catinput = document.getElementById('catinput');
    subcatinput = document.getElementById("subcatinput");
    roleinput.addEventListener('change', function () {
        if (roleinput.value.length < 1 || catinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('nextbtn-3').disabled = true
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('nextbtn-3').disabled = false
            document.getElementById('summarybtn').disabled = false
        }
    });
    catinput.addEventListener('change', function () {
        if (roleinput.value.length < 1 || catinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('nextbtn-3').disabled = true
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('nextbtn-3').disabled = false
            document.getElementById('summarybtn').disabled = false
        }
    });
    subcatinput.addEventListener('change', function () {
        if (roleinput.value.length < 1 || catinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('nextbtn-3').disabled = true
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('nextbtn-3').disabled = false
            document.getElementById('summarybtn').disabled = false
        }
    });

    brandinput = document.getElementById('brandinput');
    companyinput = document.getElementById('companyinput');
    addressinput = document.getElementById('addressinput');
    cityinput = document.getElementById('cityinput');
    countryinput = document.getElementById('countryinput');
    brandinput.addEventListener('keyup', function () {
        if (brandinput.value.length < 1 || companyinput.value.length < 1 || addressinput.value.length < 1 || cityinput.value.length < 1 || countryinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('summarybtn').disabled = false
        }
    });
    companyinput.addEventListener('keyup', function () {
        if (brandinput.value.length < 1 || companyinput.value.length < 1 || addressinput.value.length < 1 || cityinput.value.length < 1 || countryinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('summarybtn').disabled = false
        }
    });
    addressinput.addEventListener('keyup', function () {
        if (brandinput.value.length < 1 || companyinput.value.length < 1 || addressinput.value.length < 1 || cityinput.value.length < 1 || countryinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('summarybtn').disabled = false
        }
    });
    cityinput.addEventListener('keyup', function () {
        if (brandinput.value.length < 1 || companyinput.value.length < 1 || addressinput.value.length < 1 || cityinput.value.length < 1 || countryinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('summarybtn').disabled = false
        }
    });
    countryinput.addEventListener('change', function () {
        if (brandinput.value.length < 1 || companyinput.value.length < 1 || addressinput.value.length < 1 || cityinput.value.length < 1 || countryinput.value.length < 1 || subcatinput.value.length < 1) {
            document.getElementById('summarybtn').disabled = true
        } else {
            document.getElementById('summarybtn').disabled = false
        }
    });

    button = document.getElementById('submitbtn')
    button.addEventListener("click", function (e) {
        e.preventDefault();

        countrydata = iti.getSelectedCountryData();
        valueNomor = phoneinput.value
        if (valueNomor.startsWith("0")) {
            // PREFIX is exactly at the beginning
            valueNomor = valueNomor.slice(1);
        }
        phoneinput.value = countrydata['dialCode'] + phoneinput.value

        countrydata2 = iti2.getSelectedCountryData();
        valueNomor2 = compphone.value
        if (valueNomor2.startsWith("0")) {
            // PREFIX is exactly at the beginning
            valueNomor2 = valueNomor2.slice(1);
        }
        compphone.value = countrydata2['dialCode'] + compphone.value

        e.disabled = true;

        var xhr = new XMLHttpRequest();

        var data = "1=" + firstnameinput.value + "&2=" + lastnameinput.value + "&3=" + emailinput.value + "&4=" + phoneinput.value + "&5=" + roleinput.value + "&6=" + catinput.value + "&7=" + subcatinput.value + "&8=" + brandinput.value + "&9=" + companyinput.value + "&10=" + addressinput.value + "&11=" + cityinput.value + "&12=" + regioninput.value + "&13=" + countryinput.value + "&14=" + zipcodeinput.value + "&15=" + compemailinput.value + "&16=" + compphoneinput.value + "&17=" + compfaxinput.value + "&18=" + compwebsiteinput.value;
        // alert(data)

        xhr.open("POST", "submitcompany", false);

        var csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        var csrfToken = csrfTokenMeta.getAttribute('content');

        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    location.replace('after');
                } else {
                    location.replace('after');
                }
            }
        };

        xhr.send(data);
    });
</script>
<script>
    var posMenuItems = document.getElementById("catinput");
    function handleClick(e) {
        // alert('dor')
        // alert(posMenuItems.value)

        var targetType = posMenuItems.value

        // Show/hide elements based on the 'data-filter' attribute
        var posContentItems = document.querySelectorAll(
            ".subcatname"
        );

        for (let index = 0; index < posContentItems.length; index++) {
            if (targetType === "all" || posContentItems[index].getAttribute("data-type") === targetType) {
                posContentItems[index].classList.remove("d-none");
            } else {
                posContentItems[index].classList.add("d-none");
            }
        }
        document.getElementById("subcatinput").value = document.getElementById("subcatinput").getAttribute('defaultvalue');
    }
    document.addEventListener('DOMContentLoaded', function() {
        handleClick()

        firstnameinput = document.getElementById('firstnameinput');
        lastnameinput = document.getElementById('lastnameinput');
        emailinput = document.getElementById('emailinput');
        phoneinput = document.getElementById('phoneinput');
        roleinput = document.getElementById('roleinput');
        catinput = document.getElementById('catinput');
        subcatinput = document.getElementById("subcatinput");
        brandinput = document.getElementById('brandinput');
        companyinput = document.getElementById('companyinput');
        addressinput = document.getElementById('addressinput');
        cityinput = document.getElementById('cityinput');
        regioninput = document.getElementById('regioninput');
        countryinput = document.getElementById('countryinput');
        zipcodeinput = document.getElementById('zipcodeinput');
        compemailinput = document.getElementById('compemailinput');
        compphoneinput = document.getElementById('compphoneinput');
        compfaxinput = document.getElementById('compfaxinput');
        compwebsiteinput = document.getElementById('compwebsiteinput');

        summarybtn.addEventListener('click', function () {
            var textElems = document.querySelectorAll('.summary-text')
            textElems.forEach(element => {
                if (element.childNodes.length > 1) {
                    element.removeChild(element.childNodes[1])
                }
            });

            document.getElementById('summaryfirstnameinput').appendChild(document.createTextNode(firstnameinput.value));
            document.getElementById('summarylastnameinput').appendChild(document.createTextNode(lastnameinput.value));
            document.getElementById('summaryemailinput').appendChild(document.createTextNode(emailinput.value));
            document.getElementById('summaryphoneinput').appendChild(document.createTextNode(phoneinput.value));
            document.getElementById('summaryroleinput').appendChild(document.createTextNode(roleinput.options[roleinput.selectedIndex].text));
            document.getElementById('summarycatinput').appendChild(document.createTextNode(catinput.options[catinput.selectedIndex].text));
            document.getElementById('summarysubcatinput').appendChild(document.createTextNode(subcatinput.options[subcatinput.selectedIndex].text));
            document.getElementById('summarybrandinput').appendChild(document.createTextNode(brandinput.value));
            document.getElementById('summarycompanyinput').appendChild(document.createTextNode(companyinput.value));
            document.getElementById('summaryaddressinput').appendChild(document.createTextNode(addressinput.value));
            document.getElementById('summarycityinput').appendChild(document.createTextNode(cityinput.value));
            document.getElementById('summaryregioninput').appendChild(document.createTextNode(regioninput.value));
            document.getElementById('summarycountryinput').appendChild(document.createTextNode(countryinput.options[countryinput.selectedIndex].text));
            document.getElementById('summaryzipcodeinput').appendChild(document.createTextNode(zipcodeinput.value));
            document.getElementById('summarycompemailinput').appendChild(document.createTextNode(compemailinput.value));
            document.getElementById('summarycompphoneinput').appendChild(document.createTextNode(compphoneinput.value));
            document.getElementById('summarycompfaxinput').appendChild(document.createTextNode(compfaxinput.value));
            document.getElementById('summarycompwebsiteinput').appendChild(document.createTextNode(compwebsiteinput.value));
        });
    })
</script>
@endsection
