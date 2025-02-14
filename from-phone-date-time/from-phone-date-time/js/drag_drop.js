if(document.getElementById('drop_section')){
	var area = document.getElementById('drop_section');
	area.addEventListener('dragenter', fordragenter, false);
	area.addEventListener('dragover', fordragenter, false);
	area.addEventListener('dragleave', fordrop, false);
	area.addEventListener('drop', fordrop, false);
	area.addEventListener('drop', handleDrop, false)
}
var form_data = new FormData();
var files_map = new Object();
form_data.append('total', 0);
var index = 0;
var count = 0;
var count2 = 1;
var total_count = 0;
var position = 0;
//var base_url = site_url;
function handleDrop(e) {
    let dt = e.dataTransfer;
    let files = dt.files;
    $("#drag_h3").html("Drop Files Here Or Click to Upload");
    handlefiles(files);
}

function checkIfFileEmpty() {
    if (total_count == 0) {
        return true;
    } else {
        return false;
    }
}

function checkPhoneValidation() {
    var isValidPhone = $("#intl_phone").intlTelInput("isValidNumber");
    if (isValidPhone) {
        $("#phoneErrorLabel").fadeOut(100);
        var countryData = $("#intl_phone").intlTelInput("getSelectedCountryData").dialCode; //get country code.
        $("#dialCode").val(countryData);
        return true;
    } else {
        $("#phoneErrorLabel").fadeIn(100);
        return false;
    }
}

function handlefiles(files) {
    for (let index = count; index < files.length + count; index++) {
        var filename = "file" + index.toString();
        if (check_size_and_extension(files[index - count])) {
            form_data.append(filename, files[index - count]);

            previewFile(files[index - count]);
        }
    }
    count += files.length;
    form_data.set('total', count);

    for (var pair of form_data.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

}

function check_size_and_extension(file) {

    let file_extension = file.name.split(".").pop();
    if (file_extension == 'exe' || file_extension == 'php' || file.size > 50000000)
        //$("#file_upload_msg").html('File size OR file extion error in file '+file.name);
        return false;
    return true;
}

function previewFile(file) {
    let file_extension = file.name.split(".").pop();
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function () {


        var firstdiv = document.createElement('div');
        firstdiv.className = "upload_file_row";

        var secondiv = document.createElement('div');
        secondiv.className = "rowx";

        var thirdiv = document.createElement('div');
        thirdiv.className = "col-md-10x col-10x";

        var fourthdiv = document.createElement('div');
        fourthdiv.className = "dr-file-name";

        var firstp = document.createElement('p');


        if (files_map[file.name] == 101) {
            firstdiv.className = "col-3 hidden_div";
        } else {
            files_map[file.name] = 101;
        }


        var first_cross_div = document.createElement('div');
        first_cross_div.className = "col-md-2x col-2x";
        var second_cross_div = document.createElement('div');
        second_cross_div.className = "cross";
        second_cross_div.id = ++position;
        total_count++;

        var cross = document.createElement('i');
        cross.className = "fa fa-times";

        //appending div items
        second_cross_div.appendChild(cross);
        first_cross_div.appendChild(second_cross_div);

        //It shows maximum 30 charactor of file name
        var file_name_size = file.name.length;
        var file_name = "";
        for (var i = 0; i < 30 && i < file_name_size; i++) {
            file_name += file.name[i];
        }

        if (file_name_size > 30) {
            file_name += "...";
        }


        firstp.innerHTML = file_name;

        //for deleting file
        second_cross_div.onclick = function () {
            var parent = this.parentNode;
            var preparent = parent.parentNode;
            var pre2parent = preparent.parentNode;
            pre2parent.parentNode.removeChild(pre2parent);
            var filename = "file" + (this.id - 1).toString();

            //giving a fixed name to each deleted item 
            var newfile = new File(["kamal5999"], "kamal5999.txt", {
                type: "text/plain",
            });

            files_map[file.name] = 0;
            form_data.set(filename, newfile);
            total_count--;
            index--;
        };
        fourthdiv.appendChild(firstp);
        thirdiv.appendChild(fourthdiv);

        secondiv.appendChild(thirdiv);
        secondiv.appendChild(first_cross_div);

        firstdiv.appendChild(secondiv);


        document.getElementById('gallery').appendChild(firstdiv);
    }
}


function get_files(files) {
     

    var totalfiles = document.getElementById('files').files.length;
    for (let index = count; index < totalfiles + count; index++) {
        var filename = "file" + index.toString();
        if (check_size_and_extension(files[index - count])) {
            form_data.append(filename, document.getElementById('files').files[index - count]);

            previewFile(document.getElementById('files').files[index - count]);
        }
    }
    count += files.length;
    form_data.set('total', count);
    // upload(form_data);
}
function get_project_files(files,file_id) {    
    var totalfiles = document.getElementById(file_id).files.length;
    var name = document.getElementById(file_id).files.name;
    var fl_id = file_id.split("_");   
    var imgname = document.getElementById(file_id).files[0].name;
    document.getElementById('img_previ_'+fl_id[2]).innerHTML = imgname;
}


function check_captcha_validation() {
    if (grecaptcha.getResponse() == "") {

        Swal.fire({
            title: 'Invalid captcha',
            text: 'Please fill the captcha',
            type: 'error',
            confirmButtonText: 'OK'
        })

        return false;
    } else {
        return true
    }
}


function upload() {

  
    var form = document.getElementById('online_class');
    if (form.reportValidity() == false)
        return;

    $("#file_upload_msg").html('');
    $("#grade_error-msg").html('');
    $("#error-msg").html('');
    $("#choose_session_error").html('');
    var livelec_grade = $('input[name=livelec_grade]:checked').val(); 
    var course_topic = $('input[name=course_topic]:checked').val();
    if(typeof(livelec_grade) == 'undefined')
    {
        $("#grade_error-msg").html('Please select Student Class/Grade');
		return false; 
    }

    if (!iti.isValidNumber()) 
	{
		$("#error-msg").html('Please enter valid mobile number');
		return false;
    }
    // if(course_topic == "particular_topic")
    // {
    //     if (checkIfFileEmpty()) 
    //     {
    //         $("#file_upload_msg").html('Please select file');
    //         return false;
    //     }
    // }
    if ($("#choose_session").val() == "") 
    {
        $("#choose_session_error").html('Please choose Date & Time');
        return false;
    }
	

    
    
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
         form_data.append(e.name, e.value);
    }

    //get all radion button value and set into send data
    var get_seek = $('input[name=learning_seeking]:checked').val();
    
    
	form_data.append('learning_seeking', get_seek);
	form_data.append('course_topic', course_topic);
    form_data.append('livelec_grade', livelec_grade);
    if(course_topic =='particular_topic')
    {
       
        form_data.append('course_topic_name',  $("#topic_course").val());
    }
    else
    {
        form_data.append('course_topic_name',  $("#fulcourse").val());
    }

    if(get_seek == 'myself')
    {
        form_data.append('guardian',  $("#guardian_name").val());
    }
    else
    {
        form_data.append('guardian',  $("#u_name").val());
    }

    var ph_data =  iti.getSelectedCountryData();
    var dial_val =  ph_data.dialCode;
    form_data.append('dialCode', dial_val);
    form_data.append('submit_course', 'submit');
    
    var url = base_url+'/online-learning-session';
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData = form_data;
      
    xhr.addEventListener('readystatechange', function (e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $(".loading").hide(); 
            var resp = this.responseText;
             
            var get_res = resp.split("_");
            if(get_res[0] == 'error')
            {
                $('.toast').toast('show');
                $(".ser_error").show();
                $(".ser_error").html(get_res[1]);
            }
            else
            {
                Swal.fire({
                    type: 'success',
                    title: '',
                    html: 'Thank for your submitting your request. We will get back to you shortly',
                    confirmButtonText:'OK'
                }).then(function() {
                    window.location.reload();
                });

                $(".error-msg").hide();
            }

        } else if (xhr.readyState == 4 && xhr.status != 200) {
            //window.location.reload();
        }
    });
    $(".loading").show(); 
    xhr.open('POST', url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send(formData);

    
}

function upload_online_tutor() {

  
    var form = document.getElementById('get_online_tutor_form');
    if (form.reportValidity() == false)
        return;

    $("#file_upload_msg").html('');
    $("#grade_error-msg").html('');
    $("#error-msg").html('');
    $("#choose_session_error").html('');
    

    if (!iti_tutor.isValidNumber()) 
	{
		$("#error-msg").html('Please enter valid mobile number');
		return false;
    }
//    if($("#tutor_connect").val() == "some_today")
//    {
//         if ($("#dtae-time-ad").html() == "") 
//         {
//             $("#choose_session_error").html('Please choose Date & Time');
//             return false;
//         }
//     }

    if (checkIfFileEmpty()) 
    {
        $('.toast').show();
        $('.toast').toast('show');
        $("#tut_error").show();
        $("#tut_error").html('Please select file');
        return false;
    }

	

    
    
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
         form_data.append(e.name, e.value);
    }

    
    
    
    
	form_data.append('course_requirnment', tinymce.get('student_req').getContent());   
	form_data.append('course_topic', 'particular_topic');  
    
    var data = $('#particular_c').select2('data');
    form_data.append('subject_label', data[0].text); 
  

    var ph_data =  iti_tutor.getSelectedCountryData();
    var dial_val =  ph_data.dialCode;
    form_data.append('dialCode', dial_val);
    form_data.append('find_tut', 'find_tutor');
    
    var url = base_url+'/online-tutors';
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData = form_data;
      
    xhr.addEventListener('readystatechange', function (e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $(".loading").hide(); 
            var resp = this.responseText;
             
            var get_res = resp.split("_");
            if(get_res[0] == 'error')
            {
                $('.toast').show();
	        	$('.toast').toast('show');
                $("#tut_error").show();
                $("#tut_error").html(get_res[1]);
            }
            else
            {
                window.location.href=base_url+'student-dashboard';
                // Swal.fire({
                //     type: 'success',
                //     title: '',
                //     html: 'Thank for your submitting your request. We will get back to you shortly',
                //     confirmButtonText:'OK'
                // }).then(function() {
                //     window.location.reload();
                // });

                // $(".error-msg").hide();
            }

        } else if (xhr.readyState == 4 && xhr.status != 200) {
            //window.location.reload();
        }
    });
    $(".load-pict").show(); 
    xhr.open('POST', url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send(formData);

    
}

function submit_course() 
{
  
    var form = document.getElementById('course_create_form');
    if (form.reportValidity() == false)
        return;

    
    var course_product_type = $('input[name=course_product_type]:checked').val();
    
    if(typeof(course_product_type) == 'undefined')
    {
        course_product_type="";
    }
    
    var short_description = $("#short_description").val().length;

    if(short_description > 160)
    {
        $('.toast').toast('show');
        $(".ser_error").show();
        $(".ser_error").html('Allowed max 160 character');
        return false;
    }

    if (checkIfFileEmpty()) 
    {
        $('.toast').toast('show');
        $(".ser_error").show();
        $(".ser_error").html('Please select file');
        return false;
    }
    
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name=='course_search_tags[]')
          continue;

        form_data.append(e.name, e.value);
    }

    //search tags in js
    var course_search_tags = $("#course_search_tags").val();    
	for(var j=0 ; j < course_search_tags.length; j++)
	{
		form_data.append('new_course_search_tags[]',course_search_tags[j]);
	}

    

    var course_package = $('input[name=course_package]:checked').val();
    var course_attr = $('input[name=course_package]:checked').attr('course-name');
    
    if(course_attr == 'School')
    {
        var cstate = $("#course_state").val();
        form_data.append('course_state',  cstate);
    }
    else if(course_attr == 'Competitive')
    {
        var cstate = $("#comp_course_state").val();
        form_data.append('course_state',  cstate);
    }
    else
    {
        form_data.append('course_state',  '');
    }
    var course_will_learn = tinymce.get('course_will_learn').getContent();
    var course_offer_edit = tinymce.get('course_offer_edit').getContent();
    var course_req_edit = tinymce.get('course_req_edit').getContent();
    var course_content = tinymce.get('course_content').getContent();
    var full_description = tinymce.get('full_description').getContent();
    var skill_acq_edit = tinymce.get('skill_acq_edit').getContent();

    //set tiny editor values start
    form_data.append('course_will_learn', course_will_learn);
    form_data.append('course_offer_edit', course_offer_edit);
    form_data.append('course_req_edit', course_req_edit);
    form_data.append('course_content', course_content);
    form_data.append('full_description', full_description);
    form_data.append('skill_acq_edit', skill_acq_edit);
    //set tiny editor values end

    form_data.append('course_package_name', course_attr);
    form_data.append('course_package', course_package);
    form_data.append('course_product_type', course_product_type);
    form_data.append('submit_course_btn', 'submit');

    Swal.fire({
        type: 'info',
        title: '',
        html: 'Please Re-check Information entered and formatting before submission for approval',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        
        if (result.value) 
        {
            var url = base_url+'super/create_course_page';
            var xhr = new XMLHttpRequest();
            var formData = new FormData();
            formData = form_data;      
            xhr.addEventListener('readystatechange', function (e) {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    $(".load-pict").hide(); 
                    var resp = this.responseText;
                    var get_res = resp.split("_");
                   
                    if(get_res[0] == 'error')
                    {
                        $('.toast').toast('show');
                        $(".ser_error").show();
                        $(".ser_error").html(get_res[1]);
                        var errshoeid = get_res[2].replace(/-/g, '_');
                        
                        $('#'+errshoeid).css('border','1px solid red;');
                    }
                    else
                    {
                        $("#course_tok_url").val(base_url+get_res[1]);
                        $("#course_tok").val(get_res[2]);
                        $("#save_next_val").prop('disabled',true);
                        $("#submit_course_project_btn").prop('disabled',false);
                        $("#skip_course").prop('disabled',false);
                        //$('#collapseOne').collapse('hide');
                        $('#collapseTwo').collapse('show');
                        // Swal.fire({
                        //     type: 'success',
                        //     title: '',
                        //     html: 'Thank for your submitting Course. We will review your course and get back to you',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#3085d6',
                        //     cancelButtonColor: '#d33',
                        //     confirmButtonText: 'View',
                        //     cancelButtonText: 'No',
                        // }).then((result) => {
                        //     if (result.value) 
                        //     {  
                        //         window.location.href=base_url+get_res[1];                  
                        //     }
                        //     else
                        //     {
                        //         window.location.href=base_url+'super/all_course';
                        //     }
                        // });
                        
                    }

                } else if (xhr.readyState == 4 && xhr.status != 200) {
                    //window.location.reload();
                }
            });
            $(".load-pict").show(); 
            xhr.open('POST', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send(formData);
        }
        else
        {
            return;
        }
    });
    
}

function update_course() 
{
  
    var form = document.getElementById('course_create_form');
    if (form.reportValidity() == false)
        return;

    
    var course_product_type = $('input[name=course_product_type]:checked').val();
    
    if(typeof(course_product_type) == 'undefined')
    {
        course_product_type="";
    }
    
    var short_description = $("#short_description").val().length;

    if(short_description > 160)
    {
        $('.toast').toast('show');
        $(".ser_error").show();
        $(".ser_error").html('Allowed max 160 character');
        return false;
    }

    // if (checkIfFileEmpty()) 
    // {
    //     $('.toast').toast('show');
    //     $(".ser_error").show();
    //     $(".ser_error").html('Please select file');
    //     return false;
    // }
    
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name=='course_search_tags[]')
          continue;

        form_data.append(e.name, e.value);
    }


    //search tags in js
    var course_search_tags = $("#course_search_tags").val();    
	for(var j=0 ; j < course_search_tags.length; j++)
	{
		form_data.append('new_course_search_tags[]',course_search_tags[j]);
	}
    

    var course_package = $('input[name=course_package]:checked').val();
    var course_attr = $('input[name=course_package]:checked').attr('course-name');
    
    if(course_attr == 'School')
    {
        var cstate = $("#course_state").val();
        form_data.append('course_state',  cstate);
    }
    else if(course_attr == 'Competitive')
    {
        var cstate = $("#comp_course_state").val();
        form_data.append('course_state',  cstate);
    }
    else
    {
        form_data.append('course_state',  '');
    }
    var course_will_learn = tinymce.get('course_will_learn').getContent();
    var course_offer_edit = tinymce.get('course_offer_edit').getContent();
    var course_req_edit = tinymce.get('course_req_edit').getContent();
    var course_content = tinymce.get('course_content').getContent();
    var full_description = tinymce.get('full_description').getContent();
    var skill_acq_edit = tinymce.get('skill_acq_edit').getContent();

    //set tiny editor values start
    form_data.append('course_will_learn', course_will_learn);
    form_data.append('course_offer_edit', course_offer_edit);
    form_data.append('course_req_edit', course_req_edit);
    form_data.append('course_content', course_content);
    form_data.append('full_description', full_description);
    form_data.append('skill_acq_edit', skill_acq_edit);
    //set tiny editor values end

    form_data.append('course_package_name', course_attr);
    form_data.append('course_package', course_package);
    form_data.append('course_product_type', course_product_type);

    var update_link = $('input[name=update_link]:checked').val();
    if(typeof(update_link) == 'undefined')
    {
        form_data.append('update_link', 'no');
    }
    else
    {
        form_data.append('update_link', 'yes');
    }
    form_data.append('update_course_btn', 'submit');

    Swal.fire({
        type: 'info',
        title: '',
        html: 'Please Re-check Information entered and formatting before submission for approval',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        
        if (result.value) 
        {
            var url = base_url+'super/edit_course_page';
            var xhr = new XMLHttpRequest();
            var formData = new FormData();
            formData = form_data;      
            xhr.addEventListener('readystatechange', function (e) {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    $(".loading").hide(); 
                    var resp = this.responseText;
                    var get_res = resp.split("_");
                   
                    if(get_res[0] == 'error')
                    {
                        $('.toast').toast('show');
                        $(".ser_error").show();
                        $(".ser_error").html(get_res[1]);
                        var errshoeid = get_res[2].replace(/-/g, '_');
                        
                        $('#'+errshoeid).css('border','1px solid red;');
                    }
                    else
                    {
                        $("#course_tok_url").val(base_url+get_res[1]);
                        $("#course_tok").val(get_res[2]);
                       // $("#submit_course_project_btn").prop('disabled',false);
                        //$("#skip_course").prop('disabled',false);
                        //$('#collapseOne').collapse('hide');
                        $('#collapseTwo').collapse('show');
                        //window.location.href=base_url+'super/all_course';
                        // Swal.fire({
                        //     type: 'success',
                        //     title: '',
                        //     html: 'Thank for your submitting Course. We will review your course and get back to you',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#3085d6',
                        //     cancelButtonColor: '#d33',
                        //     confirmButtonText: 'View',
                        //     cancelButtonText: 'No',
                        // }).then((result) => {
                        //     if (result.value) 
                        //     {  
                        //         window.location.href=base_url+get_res[1];                  
                        //     }
                        //     else
                        //     {
                        //         window.location.href=base_url+'super/all_course';
                        //     }
                        // });
                        
                    }

                } else if (xhr.readyState == 4 && xhr.status != 200) {
                    //window.location.reload();
                }
            });
            $(".loading").show(); 
            xhr.open('POST', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send(formData);
        }
        else
        {
            return;
        }
    });

    
    
}


function fordrop(e) {
    e.preventDefault();
    
    area.classList.remove('highlight');
}

function fordragenter(e) {
    e.preventDefault();
   // alert('hi');
    $("#drag_h3").html("Drop Here");
    area.classList.add('highlight');
}

