
@extends('app')

@section('content')
                    <div class="showData">

                    </div>
                     
                    <div  id="postRequestData"></div>



              <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-offset-2" >


   <button type="submit" class="btn btn-primary" id="getRequest">Ajax</button>

                    </div>

                    </div>
                      <div class="row">
                            <div class="col-xs-6 col-sm-4 col-md-offset-4">





                                   <form class="form-horizontal" id="register" action="#" >

                                     <input type="hidden" name="_token"  id="_token" value="{{ csrf_token() }}">

                                      <div class="form-group">
                                        <label for="firstname" class="col-sm-2 control-label"> name</label>
                                        <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control"
                                                id="firstname"
                                                placeholder="first name">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="lastname" class="col-sm-2 control-label">hhh</label>
                                        <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control"
                                                id="lastname"
                                                placeholder="lastname">
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

                    </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-md-4">

                  <!-- Standard button -->
                </br>
                    <button type="button" class="btn btn-default btn-one">Default</button> <br>
                </br>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary">Primary</button>
</br>
</br>                    <!-- Indicates a successful or positive action -->
                    <button type="button" class="btn btn-success">Success</button>
</br>
</br>                    <!-- Contextual button for informational alert messages -->
                    <button type="button" class="btn btn-info">Info</button>
</br>
</br>                    <!-- Indicates caution should be taken with this action -->
                    <button type="button" class="btn btn-warning">Warning</button>
</br>
</br>                    <!-- Indicates a dangerous or potentially negative action -->
                    <button type="button" class="btn btn-danger">Danger</button>
</br>
</br>
<button class="btn btn-danger btn-xs" id="destroy" data-id="5"> delete</button>

                </div>

                <div class="col-xs-6 col-md-4">
                  <div class="row">
                    <div class="col-md-12 bg-primary part-one">
                      <p>Most debugger consoles support displaying objects directly. Just use console.log(obj);
                        . Depending on your debugger this most likely will .</p>
                    </div>
                    <div class="col-md-12 bg-warning part-two">
                      <p>Most debugger consoles support displaying objects directly. Just use console.log(obj);
                        . Depending on your debugger this most likely will .</p>
                    </div>

                  </div>
                </div>
                <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
              </div>


      </div>


@endsection
