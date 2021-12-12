
<div class="modal-size-lg d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="CertificateRequest" tabindex="-1" role="dialog" aria-labelledby="SubmitEvolution" aria-hidden="true">
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
                    <h4 class="modal-title" id="CertificateRequest">Certificate Request Form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                  <form action="{{route('certificate-request-store')}}" method="POST">
                    @csrf



                      <div class="row">
                          <div class="col-md-6 col-12">
                              <div class="form-group">
                                  <label for="first-name-column">Name</label>

                                  <input name="name" type="text"  class="form-control" placeholder="Your name on Certificate" />
                              </div>
                          </div>
                          <div class="col-md-6 col-12">
                              <div class="form-group">
                                  <label for="last-name-column">Company</label>
                                  <input type="text" name="company_name" class="form-control" placeholder="Company Name"  required/>
                              </div>
                          </div>
                          <div class="col-md-6 col-12">
                              <div class="form-group">
                                  <label for="last-name-column">Email</label>
                                  <input type="email" name="email" class="form-control" placeholder="Enter Email Address"  required/>
                              </div>
                          </div>
                          <div class="col-md-6 col-12">
                              <div class="form-group">
                                  <label for="last-name-column">Mobile Phone</label>
                                  <input type="number" name="phone" class="form-control" placeholder="Enter your phone Number" required/>
                              </div>
                          </div>




                          <div class="col-md-6 col-12">


                                <label for="pd-default">Start Date</label>
                                <input data-validation="required" type="date" name="start_date" id="pd-default"  class="form-control pickadate" placeholder="d/m/Y" />

                          </div>
                          <div class="col-md-6 col-12">


                                <label for="pd-default">End Date</label>
                                <input data-validation="required" name="end_date" type="date" class="form-control pickadate" placeholder="d/m/Y" required />

                          </div>
                          <?php
                          $classroom_course= App\Models\ClassroomCourse::all();

                          ?>

                          <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="custom select">Select Course</label>
                            <select class="form-control" id="classroom-select" name="classroom_course_id">
                              <option  label="Choose Course"></option>
                              <?php foreach ($classroom_course as $item): ?>
                                <option data-validation="required" id="classroom-select" value="{{$item->id}}">{{$item->classroom_course_title}}</option>
                              <?php endforeach; ?>

                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Total Hours</label>
                                <input type="number" name="total_hours" class="form-control" placeholder="Enter Total Hours" required/>
                            </div>
                        </div>


                            <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label class="col-form-label">Reason for participation:</label>
                            <div>
                              <textarea class="form-control" data-validation="required" id="reason" name="reason"  > </textarea>
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
                                <td class="cell-label">Your experience about training</td>
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
                                <td class="cell-label">Training presentation material</td>
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
                                <td class="cell-label">Please rate Course material</td>
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
                                <td class="cell-label">Your overall satisfaction  </td>
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
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
