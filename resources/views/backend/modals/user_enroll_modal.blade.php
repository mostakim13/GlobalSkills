<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<div class="modal fade user_enroll_modal" id="myModal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="user_enroll_form" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                <input type="hidden" name="enrollment_id">
                <input type="hidden" name="purpose">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Enroll user</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control course" id="course_select_field" name="course_id" style="width:414px;">
                                <option disabled="" selected="" value="-1">Select course</option>
                                <?php foreach($course_list as $course){?>
                                    <option  value="<?= $course->id; ?>"><?= $course->course_title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inserted_price"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <p>
                                <span>
                                    Regular price:
                                    <input type="radio" class="price_option" name="price" value="regular_price" id="regular_price" />
                                </span>
                                <span id="discount_price_radio" style="display: none;">
                                    Discounted price:
                                    <input type="radio" class="price_option" name="price"  value="discounted_price" id="discounted_price" />
                                </span>
                                <span>
                                    Other:
                                    <input type="radio" class="price_option" name="price" value="other" id="other" />
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inserted_price">Price </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="test" id="inserted_price" name="inserted_price" class="form-control col-md-6 col-sm-6 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="access">Access  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="test" class="form-control course" id="access" name="access" />
                        </div>
                    </div>

                    <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expiry_month">Expiray Date <span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input placeholder="Enter the expire date" type="text"  name="expiry_date" class="form-control col-md-7 col-xs-12" >
                         </div>
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="reset" id="user_enroll_reset_button">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">


$(document).ready(function() {
    $('#course_select_field').select2({
        dropdownParent: $('#myModal')
    });
});


    $("#course_select_field").change(function(){
        course_id = $(this).val();
        course = null;
        for (var i = 0; i < course_list.length; i++){
            if (course_list[i].id == course_id){
                course = course_list[i];
                break;
            }
        }

        $("#price_tab").show();
        if (course.discount_flag == null || course.discount_flag == false){
            $("#discount_price_radio").hide();
        } else {
            $("#discount_price_radio").show();
        }

        $("#regular_price").prop("checked", true);
        $("#inserted_price").val(course.price)

    });


    $('input[name=price]').change(function(){
        var value = $( 'input[name=price]:checked' ).val();
        if (value == 'regular_price'){
            $("#inserted_price").val(course.price);
        } else if (value == 'discounted_price'){
            $("#inserted_price").val(course.discounted_price);
        } else if (value == 'other'){
            $("#inserted_price").val("");
        }
    });


</script>
