@extends('layout.signinqr')
@section('title', 'Home')

@section('content')
    <div class="vh-100 d-flex justify-content-center mx-auto flex-column" style="max-width: 75vw">
        <img src="/assets/img/logo/mlogo.png" class="w-50 mx-auto" alt="Site Logo" />
        <img class="dark-logo" src="/assets/img/logo/mlogo.png" alt="Site Logo" style="display: none;" />
        <div id="kuisioner" class="mt-4 p-4 rounded" style="background-color: #bbb">
            <h3 class="text-center text-light">Do you want to upload file about your company?</h3>
            <div class="d-flex justify-content-center">
                <button id="yes-button" data-toggle="modal" data-target="#modalUpload" class="btn btn-primary rounded me-2">Yes</button>
                <button id="no-button" class="btn btn-primary rounded ms-2">No</button>
            </div>
        </div>
        <div class="form-group alert alert-danger" id="message-valid" style="background-color: green; display:none">
            <h2 class="text-center" style="color:white">Company Data Submitted. Thank you for registering.</h2>
        </div>
    </div>

    <div class="modal fade modal-add-contact" style="overflow-y: auto" id="modalUpload" name="modalUpload" tabindex="-1"
role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header px-4 flex-column">
                    <h3 class="modal-title" id="exampleModalCenterTitle">Upload File</h3>
                </div>

                <div class="modal-body px-4">
                    <div class="mb-3">
                        <input class="form-control" id="upload-file" style="padding: 6px 12px; font-size:20px; line-height:unset" type="file">
                    </div>
                    <button id="upload-button" class="btn btn-primary rounded btn-sm">Upload</button>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill"
                    data-toggle="modal" data-target="#modalUpload">Close</button>
                </div>
                <form id="redirectPost" action="upload" method="post">
                    @csrf
                    <input type="hidden" id="database64" name="database64" value="">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('no-button').addEventListener("click", function() {
                location.replace('noupload')
            })

            function getBase64(file, callback) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    callback(reader.result)
                };
                reader.onerror = function (error) {
                    alert('cannot upload document : ' + error);
                };
            }
            function VerifyUploadSizeIsOK()
            {
               /* Attached file size check. Will Bontrager Software LLC, https://www.willmaster.com */
               var UploadFieldID = "file-upload";
               var MaxSizeInBytes = 15728640;
               var fld = document.getElementById("upload-file");
               if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
               {
                    alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
               } else {
                    var reader = new FileReader();
                    var baseString;
                    reader.onloadend = function () {
                        baseString = reader.result;
                        theBase64 = baseString
                    };
                    getBase64(fld.files[0], function (baseString) {
                        document.getElementById('database64').value = baseString;
                        document.getElementById('redirectPost').submit();
                    });
               }
            }
            
            document.getElementById('upload-button').addEventListener('click', VerifyAndBase64)
            function VerifyAndBase64() {
                VerifyUploadSizeIsOK();
            }
        })
    </script>
        
@endsection
