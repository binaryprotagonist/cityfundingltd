  @extends('layouts.app')
  @section('content')
    <!-- Setting Page -->
    <section id="setting" class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="sidemenu" id="rborder">
              <h2>{{__('Settings')}}</h2>
              <ul>
                <li style="list-style: none">
                  <a href="Setting.html">{{__('Subscription')}}</a>
                </li>
                <li><a class="sideactive" href="#">{{__('Personal Info')}}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div class="profile">
              <div class="pheadcontent">
                <span>{{__('You are signed in with')}} </span>
                <h5>{{ Auth::user()->email }}</h5>
              </div>
              <form id="updateProfileForm">
                <div class="avtar">
                  <input type="file" id="profile-input-file" value="" accept="image/*" style="display:none" />
                  <h5>{{__('Profile Picture')}}</h5>
                  <img src="{{Auth::user()->profileImageUrl}}" alt="{{Auth::user()->name}}" />
                  <i class="fa fa-pencil" id="btn-upload-profile-image"></i>
                </div>

                <div  class="profile-edit">
                  <span  class="  items-center">
                    <button  class="btn btn-profile-edit">{{__('Edit')}}</button>
                    <button type="submit" class="btn btn-profile-save" >{{__('Save')}}</button>
                    <button  class="btn btn-profile-cancel" >{{__('Cancel')}}</button>
                  </span>
                   
                  </div>
                <div class="form-group">
                  <div class="name">
                    <label for="name">{{__('Your name')}}</label>
                    <input
                      type="text"
                      class="input-group"
                      name="first_name"
                      value="{{Auth::user()->first_name}}"
                      placeholder="{{__('First Name')}}"
                      readonly
                    />
                  </div>
                  <div class="name">
                    <label for="name"></label>
                    <input
                      type="text"
                      class="input-group"
                      name="last_name"
                      value="{{Auth::user()->last_name}}"
                      placeholder="{{__('Last Name')}}"
                      readonly
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="name">
                    <label for="name">{{__('Email Address')}}</label>
                    <input
                      type="email"
                      name="email"
                      class="input-group"
                      value="{{Auth::user()->email}}"
                      placeholder="{{__('Email Address')}}"
                      readonly
                    />
                  </div>
                  <div class="name">
                    <label for="name">{{__('Mobile Number')}}</label>
                    <input
                      type="number"
                      class="input-group"
                      name="phone"
                      value="{{Auth::user()->phone}}"
                      placeholder="{{__('Mobile Number')}}"
                     readonly
                    />
                  </div>
                </div>
                <!-- <div class="btn-group">
                  <button type="submit" class="btn-primary">{{__('Save Details')}}</button>
                </div> -->
              </form>
              <div class="password-reset">
              <div  class="flex mb-2">
                <span  class="password-setting mb-2">{{__('Password Setting')}}</span>
                <span  class="ms-auto  items-center">
                  <i class="fa fa-pencil btn-password-change" id="btn-password-change"></i>
                  <i class="fa fa-check btn-password-save" id="btn-password-update"></i>
                  <i class="fa fa-times btn-password-cancel" id="btn-password-cancel"></i>
                </span>
              </div>
             
              <div class="form-group change-password-wrapper">
                  <form id="changePasswordForm">
                    <div class="name">
                      <label for="name">{{__('New Password')}}</label>
                      <input
                        type="password"
                        name="password"
                        class="input-group"
                        value=""
                        placeholder="{{__('New Password')}}"
                      />
                    </div>
                    <div class="name">
                      <label for="name">{{__('Confirm Password')}}</label>
                      <input
                      type="password"
                        class="input-group"
                        name="password_confirmation"
                        value=""
                        placeholder="{{__('Confirm Password')}}"
                      />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <!-- Login Modal -->
      <div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-end">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="source-image-wrapper">
                   <img src="" id="source-image" />
               </div>
               <div class="button-wrapper mt-10 ">
                  <button class="btn btn-primary" onClick="cropeImage()">Crop Image</button>
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Login Modal -->
  @endsection
  @push('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"
        integrity="sha512-+VDbDxc9zesADd49pfvz7CgsOl2xREI/7gnzcdyA9XjuTxLXrdpuz21VVIqc5HPfZji2CypSbxx1lgD7BgBK5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
           #source-image{
             width : 100%;
           }
           .button-wrapper{
            margin-top: 10px;
           }
        </style>
  @endpush
  @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"
        integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>

       $('.btn-profile-save').hide();
       $('.btn-profile-cancel').hide();
       $('.btn-password-cancel').hide();
       $('.btn-password-save').hide();
       $('.change-password-wrapper').hide();

       $('.btn-profile-edit').on('click',function(e){
            e.preventDefault();
            $('.btn-profile-save').show();
            $('.btn-profile-cancel').show();
            $('.btn-profile-edit').hide();
            $('#updateProfileForm input').removeAttr('readonly');
       });

      $('.btn-profile-cancel').on('click',function(e){
        e.preventDefault();
        $('.btn-profile-save').hide();
        $('.btn-profile-cancel').hide();
        $('.btn-profile-edit').show();
        $('#updateProfileForm input').attr('readonly','readonly');
        $('#updateProfileForm')[0].reset();
      });

      $('.btn-password-change').on('click',function(e){
        e.preventDefault();
        $('.btn-password-save').show();
        $('.btn-password-cancel').show();
        $('.btn-password-change').hide();
        $('.change-password-wrapper').show();
        $('#changePasswordForm')[0].reset();
      });

       $('.btn-password-cancel').on('click',function(e){
        e.preventDefault();
        $('.btn-password-save').hide();
        $('.btn-password-cancel').hide();
        $('.btn-password-change').show();
        $('.change-password-wrapper').hide();
        $('#changePasswordForm')[0].reset();
      });

       $('#btn-upload-profile-image').on('click',function(e){
         e.preventDefault();
         $('#profile-input-file').trigger('click');
       })

       $('#profile-input-file').on('change',function(e){
           e.preventDefault();
           tmppath = URL.createObjectURL(event.target.files[0]);
           $('#source-image').attr('src',tmppath);
           $('#cropperModal').modal('show');
       });

         var $image = null;
         var cropper = null;
         var blobProfileImage = '';
         $('#cropperModal').on('shown.bs.modal', function() {
            $image = document.getElementById('source-image');
            cropper = new Cropper($image, {
                aspectRatio: 1 / 1,
                movable: true,
                zoomable: true,
                rotatable: true,
                scalable: true,
                viewMode: 3,
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        function cropeImage() {
            let canvas = cropper.getCroppedCanvas();
            canvas.toBlob((blob) => {
               $('.avtar').find('img').attr('src',URL.createObjectURL(blob));
               blobProfileImage = blob;
            }, 'image/png');
            $('#cropperModal').modal('hide');
        }

       /**
       * Update Profle
       */
       $('#updateProfileForm').on('submit',function(e){
           e.preventDefault();

           let form  =  $(this);
           let modal =  $('#updateProfileForm');
           let data  = new FormData(this);
               data.append('profile_image',blobProfileImage);
           ajaxCall("{{route('ajax.userUpdateProfile')}}",'POST',data,true)
           .then((response) => {
                form.find('p.error_msg').remove();
                if(response.status == 'success'){
                   blobProfileImage = '';
                   $('.avtar').find('img').attr('src',response.data.profileImageUrl);
                   $('.img.img-profile.rounded-circle').attr('src',response.data.profileImageUrl);
                   $('.profile-details').find('.fullname').text(response.data.name);
                   $('.profile-details').find('.mail small').text(response.data.email);
                   toastr.success(response.message);
                  $('.btn-profile-save').hide();
                  $('.btn-profile-cancel').hide();
                  $('.btn-profile-edit').show();
                  $('#updateProfileForm input').attr('readonly','readonly');
                }
                if(response.status == 'failed'){
                   toastr.error(response.message);
                }
                if(response.status == 'error'){
                     $.each(response.errors, function(key, val) {
                         form.find('[name='+key+']').after('<p class="error_msg">'+val+'</p>');
                     });
                }
           });
       });


       /**
       * Change Password
       */
       $('#btn-password-update').on('click',function(e){
           e.preventDefault();
           let form  =  $('#changePasswordForm');
           let data  =  form.serialize();
           ajaxCall("{{route('ajax.changePassword')}}",'PUT',data,false)
           .then((response) => {
                form.find('p.invalid-feedback').remove();
                if(response.status == 'success'){
                  $('.btn-password-save').hide();
                  $('.btn-password-cancel').hide();
                  $('.btn-password-change').show();
                  $('.change-password-wrapper').hide();
                  $('#changePasswordForm')[0].reset();
                   toastr.success(response.message);
                }
                if(response.status == 'failed'){
                   toastr.error(response.message);
                }
                if(response.status == 'error'){
                     $.each(response.errors, function(key, val) {
                         form.find('[name='+key+']').after('<p class="invalid-feedback">'+val+'</p>');
                     });
                }
           });
       });
    </script>
  @endpush
  
