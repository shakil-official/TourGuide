
              <!--           create             -->

              <form class="form-horizontal" id="register" action="#" >

                <input type="hidden" name="_token"  id="_token" value="{{ csrf_token() }}">

                 <div class="form-group">
                   <label for="countryName" class="col-sm-2 control-label"> name</label>
                   <div class="col-sm-10">
                     <input type="text"
                           class="form-control"
                           id="createCountryName"
                           placeholder="Country Name">
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                       <input type="submit"
                              value="Register"
                              class="like"
                              class="btn btn-danger">


                   </div>
                 </div>
               </form>

  <!--              create end              -->
