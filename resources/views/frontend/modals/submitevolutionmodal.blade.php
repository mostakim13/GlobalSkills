
<div class="modal-size-lg d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="SubmitEvolution" tabindex="-1" role="dialog" aria-labelledby="SubmitEvolution" aria-hidden="true">
        <div class="modal-dialog modal-di
        alog-centered modal-lg" role="document">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="SubmitEvolution">Evolution Form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                  <form class="form" action="{{route('store-evolution')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <?php
                      $trainers= App\Models\Trainer::where('course_id',$course->id)->first();
                      //dd($trainers);

                     ?>


                  <input type="hidden" name="trainer_id" value="{{(isset($trainers->id))}}">




                      <div class="row">
                          <div class="col-md-6 col-12">
                              <div class="form-group">
                                  <label for="first-name-column">Name</label>

                                  <input value="{{Auth::user()->name}}" type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column" />
                              </div>
                          </div>
                          <div class="col-md-6 col-12">
                              <div class="form-group">
                                  <label for="last-name-column">Company</label>
                                  <input type="text" name="company_name" class="form-control" placeholder="Company Name" name="lname-column" required/>
                              </div>
                          </div>




                          <div class="col-md-6 col-12">


                                <label for="pd-default">Start Date</label>
                                <input name="start_date" value="{{ $enrolled->created_at->format('d/m/Y') }}" id="pd-default" type="text" class="form-control pickadate" placeholder="18 June, 2020" />

                          </div>
                          <div class="col-md-6 col-12">


                                <label for="pd-default">End Date</label>
                                <input name="end_date" type="date" class="form-control pickadate" placeholder="18 June, 2020" required />

                          </div>

                            <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label class="col-form-label">Reason for participation:</label>
                            <div>
                              <textarea class="form-control" id="reason" name="reason"  required > </textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 col-12">
                          <table class="table" >


                            <thead>
                              <tr>
                               <th class="cell-label">&nbsp;</th>
                               <th>Very Happy</th>
                               <th>Happy</th>
                               <th>Good</th>
                               <th>Need Improvement</th>
                               <th>Extremely Unhappy</th>

                             </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Please rate trainer’s competence</td>
                                <td><input type="radio" name="trainers_competence" class="radio" value="Very Happy" required></td>
                                <td><input type="radio" name="trainers_competence" class="radio" value="Happy" required></td>
                                <td><input type="radio" name="trainers_competence" class="radio" value="Good" required></td>
                                <td><input type="radio" name="trainers_competence" class="radio" value="Need Improvement" required></td>
                                <td><input type="radio" name="trainers_competence" class="radio" value="Extremely Unhappy" required></td>
                              </tr>
                              @error('rating')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror

                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div>
                        <div class="col-md-12 col-12">
                          <table class="table" >


                            <thead>
                              <tr>
                               <th class="cell-label">&nbsp;</th>
                               <th>Very Happy</th>
                               <th>Happy</th>
                               <th>Good</th>
                               <th>Need Improvement</th>
                               <th>Extremely Unhappy</th>

                             </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Your experience about training and exam booking</td>
                                <td><input type="radio" name="experience" class="radio" value="Very Happy" required></td>
                                <td><input type="radio" name="experience" class="radio" value="Happy" required></td>
                                <td><input type="radio" name="experience" class="radio" value="Good" required></td>
                                <td><input type="radio" name="experience" class="radio" value="Need Improvement" required></td>
                                <td><input type="radio" name="experience" class="radio" value="Extremely Unhappy" required></td>
                              </tr>
                              @error('rating')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror

                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div>
                        <div class="col-md-12 col-12">
                          <table class="table" >


                            <thead>
                              <tr>
                               <th class="cell-label">&nbsp;</th>
                               <th>Very Happy</th>
                               <th>Happy</th>
                               <th>Good</th>
                               <th>Need Improvement</th>
                               <th>Extremely Unhappy</th>

                             </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Please rate training presentation material</td>
                                <td><input type="radio" name="presentation" class="radio" value="Very Happy" required></td>
                                <td><input type="radio" name="presentation" class="radio" value="Happy" required></td>
                                <td><input type="radio" name="presentation" class="radio" value="Good" required></td>
                                <td><input type="radio" name="presentation" class="radio" value="Need Improvement" required></td>
                                <td><input type="radio" name="presentation" class="radio" value="Extremely Unhappy" required></td>
                              </tr>
                              @error('rating')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror

                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div>
                        <div class="col-md-12 col-12">
                          <table class="table" >


                            <thead>
                              <tr>
                               <th class="cell-label">&nbsp;</th>
                               <th>Very Happy</th>
                               <th>Happy</th>
                               <th>Good</th>
                               <th>Need Improvement</th>
                               <th>Extremely Unhappy</th>

                             </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Please rate Course material (Printed book or e-book)</td>
                                <td><input type="radio" name="material" class="radio" value="Very Happy" required></td>
                                <td><input type="radio" name="material" class="radio" value="Happy" required></td>
                                <td><input type="radio" name="material" class="radio" value="Good" required></td>
                                <td><input type="radio" name="material" class="radio" value="Need Improvement" required></td>
                                <td><input type="radio" name="material" class="radio" value="Extremely Unhappy" required></td>
                              </tr>
                              @error('rating')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror

                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div>
                        <div class="col-md-12 col-12">
                          <table class="table" >

                            <thead>
                              <tr>
                               <th class="cell-label">&nbsp;</th>
                               <th>Very Happy</th>
                               <th>Happy</th>
                               <th>Good</th>
                               <th>Need Improvement</th>
                               <th>Extremely Unhappy</th>

                             </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Usefulness of the training</td>
                                <td><input type="radio" name="usefullness" class="radio" value="Very Happy" required></td>
                                <td><input type="radio" name="usefullness" class="radio" value="Happy" required></td>
                                <td><input type="radio" name="usefullness" class="radio" value="Good" required></td>
                                <td><input type="radio" name="usefullness" class="radio" value="Need Improvement" required></td>
                                <td><input type="radio" name="usefullness" class="radio" value="Extremely Unhappy" required></td>
                              </tr>
                              @error('rating')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror

                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div>
                        <div class="col-md-12 col-12">
                          <table class="table" >

                            <thead>
                              <tr>
                               <th class="cell-label">&nbsp;</th>
                               <th>Very Happy</th>
                               <th>Happy</th>
                               <th>Good</th>
                               <th>Need Improvement</th>
                               <th>Extremely Unhappy</th>

                             </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Your overall satisfaction in this training </td>
                                <td><input type="radio" name="satisfaction" class="radio" value="Very Happy" required></td>
                                <td><input type="radio" name="satisfaction" class="radio" value="Happy" required></td>
                                <td><input type="radio" name="satisfaction" class="radio" value="Good" required></td>
                                <td><input type="radio" name="satisfaction" class="radio" value="Need Improvement" required></td>
                                <td><input type="radio" name="satisfaction" class="radio" value="Extremely Unhappy" required></td>
                              </tr>
                              @error('rating')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror

                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div>



                      </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Submit To Download Certificate</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')

<script>
$(document).ready(function() {
  $('#reason').summernote();
});
</script>

@endpush
