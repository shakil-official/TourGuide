<small>Rating </small> 
  <div id="hearts-existing"
       class="starrr"
       id="star"
       data-id={{$post->id }}
       data-user=""
       data-rating={{ $rating }}>
  </div>



                    <!-- Modal -->
                  <div  id = "ratingmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="gridSystemModalLabel" style=" color: #0b508c; text-align: center; ">Please login to facebook</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-9">
                              <button type="button"
                                class="btn btn-primary"
                                style=" margin: 140px;">
                                <a href="{{ url('/auth/facebook') }}"
                                   class="btn btn-block btn-social btn-facebook"
                                   style=" color: #c3e4ff; ">
                                   <span class="fa fa-facebook"
                            style="color: #337ab7;
                                    background: #ffffff;
                                    padding: inherit;">
                                      </span>
                                       Sign in with Facebook
                                      </a>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->


                      {{Session::put('attempted_url', URL::current())}}
