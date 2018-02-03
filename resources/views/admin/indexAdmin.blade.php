@extends('app')

@section('content')
        @include('admin.header')
        <div class="container-fluid">
          <div class="row">
            {{-- <div class="col-xs-12 col-md-12 header-box">
              <h3 class="text-center text-primary headline-of-page">Tour Guide</h3>
            </div> --}}
            <div class="col-xs-12 col-md-12 btn-box">
              <div class="row">
                <div class="col-xs-12 col-md-2">
                  <!-- Add button -->
                  <button type="button" class="btn   btn-custom-box">Add Here</button>
                </div>
                <div class="col-xs-4 col-md-10 ">
                  <!-- other button -->
                  <div class="other-btn-box">
                    <button type="button" class="btn btn-default other-btn-box country-option">Country</button>
                    <button type="button" class="btn btn-default other-btn-box division-option">Division</button>
                    <button type="button" class="btn btn-default other-btn-box district-option">District</button>
                    <button type="button" class="btn btn-default other-btn-box place-option">Place</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-md-12 select-body-tourGuide">
              @include('admin.tourGuide') <!--here add create option -->
            </div>

            <!--  *********************
                                  *****
                                  ******
                                  ******
                                  ********************* -->

            <!--  country work start  -->

            <div class="col-xs-12 col-md-12 select-body-country">

              <div class="countryCreateBox">
                <button type="button" id="countryCreateBox" name="button" class="btn btn-primary" style="margin-bottom: 12px;">Country Create </button>

                <div class="showCreate">

                  <form class="form-horizontal" id="register" action="#" >

                    <input type="hidden" name="_token"  id="_token" value="{{ csrf_token() }}">

                     <div class="form-group">
                       <label for="Add Country" class="col-sm-2 control-label"> name</label>
                       <div class="col-sm-10">
                         <input type="text"
                               class="form-control"
                               id="createCountryName"
                               placeholder="Add Country">
                       </div>
                     </div>

                     <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                           <input type="submit"
                            value="Register"
                            class="like btn btn-primary"
                            >
                       </div>
                     </div>
                   </form>
                </div>
              </div>


              <div class="col-xs-12 col-md-12 show-edit-country">
                <div class="single-edit-box">
                  <h4>Edit Name</h4>
                <form id = "countryEdit" action = "#">

                  <div class="form-group">
                    <label for="" class="">   </label>
                    <div class="countryEdit-box">

                    </div>
                      <div class="modal-footer">
                      <button type="submit" name="button"  class="countryEdit btn btn-primary">Submit</button>
                        <input type="hidden" value=" " name="_token">
                        <input type="hidden" value=" " name="id">
                      </div>
                  </div>
                </form>

                </div>
              </div>

              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">
                      &nbsp;
                    </th>
                  </tr>
                </thead>

                <tbody id="countryTbody">
                  <tr>

                  </tr>
                </tbody>
              </table>
            </div>

              <!--  country work end  -->

              <!--  *********************
                                    *****
                                    ******
                                    ******
                                    ********************* -->

                <!--  Division work start  -->

            <div class="col-xs-12 col-md-12 select-body-division">

              <div class="divisionCreateBox">

                <button type="button" id="divisionCreateBtn" name="button" class="btn btn-primary" style="margin-bottom: 12px;">division Create </button>
                <div class="divisionshowCreate">

                  <form class="form-horizontal" id="divisionRegister" action="#" >
                    <input type="hidden" name="division_token"  id="division_token" value="{{ csrf_token() }}">

                     <div class="form-group">
                       <label for="createDivisionName" class="col-sm-2 control-label">Division</label>
                       <div class="col-sm-10">
                         <input type="text"
                               class="form-control"
                               id="createdivisionName"
                               placeholder="Add Division">
                       </div>
                     </div>

                     <div class="form-group">
                       <label for="Country" class="col-sm-2 control-label">Country</label>
                       <div class="col-sm-10">
                          <select class="form-control countrySelect" id="divisionCountry" name="divisionCountry">


                          </select>
                       </div>
                     </div>

                     <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                           <input type="submit"
                            value="Register"
                            class="divisionSubmit btn btn-primary"
                            >
                       </div>
                     </div>
                   </form>
                </div>

                <div class="col-xs-12 col-md-12 show-edit-division">
                  <div class="single-edit-box">
                    <h4>Edit Name</h4>


                  <form  id="DivisionEditForm"  action = "#">
                    <div class="form-group">
                      <div class="DivisionEdit-box">                      </div>
                      <div class="modal-footer">
                      <button type="submit" name="button"  class="countryEdit btn btn-primary">Submit</button>
                        <input type="hidden" value=" " name="_token">
                        <input type="hidden" value=" " name="id">
                      </div>
                    </div>
                  </form>

                  </div>
                </div>

                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Division Name</th>
                      <th colspan="2">
                        &nbsp;
                      </th>
                    </tr>
                  </thead>

                  <tbody id="divisionTbody">
                    <tr>

                    </tr>
                  </tbody>
                </table>




              </div>



              <!--        -->




            </div>

              <!--  division work end  -->

                <!--  *********************
                                      district
                                      ********************* -->

            <div class="col-xs-12 col-md-12 select-body-district">
              <div class="districtCreateBox">
                <button type="button" id="districtCreateBox" name="button" class="btn btn-primary" style="margin-bottom: 12px;">District Create </button>

           <!-- district create  -->

           <div class="districtshowCreate">

             <form class="form-horizontal" id="districtRegister" action="#" >
               <input type="hidden" name="district_token"  id="token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label for="createdistrictName"  class="col-sm-2 control-label">District</label>

                  <div class="col-sm-10">
                    <input type="text"
                          class="form-control"
                          id="createdistrictName"
                          placeholder="Add District">
                  </div>
                </div>

                <div class="form-group">
                  <label for="division" class="col-sm-2 control-label">Division</label>
                  <div class="col-sm-10">
                     <select class="form-control" id="districtDivision" name="districtDivision">


                     </select>
                  </div>
                </div>



                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit"
                       value="Register"
                       class="districtSubmit btn btn-primary"
                       >
                  </div>
                </div>
              </form>
           </div>




           <div class="col-xs-12 col-md-12 show-edit-district">

             <form  id="DistrictEditForm"  action = "#">
               <div class="form-group">
                 <div class="districtEdit-box">                      </div>
                 <div class="modal-footer">
                 <button type="submit" name="button"  class="districtFormEdit btn btn-primary">Submit</button>
                   <input type="hidden" value=" " name="_token">
                   <input type="hidden" value=" " name="id">
                 </div>
               </div>
             </form>


           </div>


           <!-- district create end  -->

           <table class="table table-hover table-striped">
             <thead>
               <tr>
                 <th>ID</th>
                 <th>Division Name</th>
                 <th colspan="2">
                   &nbsp;
                 </th>
               </tr>
             </thead>

             <tbody id="districtTbody">

             </tbody>
           </table>

</div>
            </div>

            <!--   Place Start here -->

            <div class="col-xs-12 col-md-12 select-body-place">

              <div class="placeShowBox">
                <button type="button" id="PlaceCreateBox" name="button" class="btn btn-primary" style="margin-bottom: 12px;">Place Create</button>



           <div class="PlacehowCreate">
               <form class="form-horizontal" id="PlaceRegister" action="#" >
                 <input type="hidden" name="Place_token"  id="Place_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="createPlaceName"  class="col-sm-2 control-label">Place</label>

                    <div class="col-sm-10">
                      <input type="text"
                            class="form-control"
                            id="createPlaceName"
                            placeholder="Add Place ">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="division" class="col-sm-2 control-label">District </label>
                    <div class="col-sm-10">
                       <select class="form-control" id="Placedistrict" name="Placedistrict">
                       </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit"
                         value="Register"
                         class="PlaceSubmit btn btn-primary"
                         >
                    </div>
                  </div>
                </form>
             </div>




             <div class="col-xs-12 col-md-12 show-edit-Place">
                              <form  id="PlaceEditForm"  action = "#">
                 <div class="form-group">
                   <div class="PlaceEdit-box">                      </div>

                   <div class="modal-footer">
                   <button type="submit" name="button"  class="PlaceFormEdit btn btn-primary">Submit</button>
                     <input type="hidden" value=" " name="_token">
                     <input type="hidden" value=" " name="id">
                   </div>
                 </div>
               </form>
             </div>




             <table class="table table-hover table-striped">
               <thead>

               </thead>

               <tbody id="PlaceTbody">
                 <tr class="placeshowing">
                 </tr>

               </tbody>
             </table>

           </div>
            </div> <!-- -->

          </div>
        </div>



@endsection
