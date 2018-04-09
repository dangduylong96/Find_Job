$(document).on('click','.button-collapse',function(){
    var current_element=$(this);
    if(current_element["0"].innerHTML=='<i class="fa fa-sort-up"> Thu gọn</i>')
    {
        current_element["0"].innerHTML='<i class="fa fa-sort-desc"> Mở rộng</i>';
    }else
    {
        current_element["0"].innerHTML='<i class="fa fa-sort-up"> Thu gọn</i>';
    }
})
var token=$('input[name="_token"]').val();
var id=$('input[name="id_profile"]').val();
//Thêm mục tiêu nghề nghiệp
$('#add_target').click(function(){
    var form_target='<label for="inputEmail3" class="col-sm-2 control-label">Mục tiêu</label><div class="col-sm-10"><div class="col-sm-10"><textarea name="target" class="form-control" rows="10"  placeholder="Mục tiêu nghề nghiệp" required></textarea><span id="target_error" class="error"></span></div></div><div class="button-custom"><button id="submit_target" type="button" class="btn btn-danger btn-lg"><i class="fa fa-save">Lưu</i></button><button id="reset_target" type="button" class="btn btn-default btn-lg"><i class="fa fa-remove">Hủy</i></button></div>';
    $('#target').html(form_target);
})
//Sửa mục tiêu nghề nghiệp
$(document).on('click','#edit_target',function(){
    $('textarea[name="target"]').removeAttr('disabled');
    $('#button_target').html('<button id="submit_target" type="button" class="btn btn-danger btn-lg"><i class="fa fa-save">Lưu</i></button><button id="reset_target" type="button" class="btn btn-default btn-lg"><i class="fa fa-remove">Hủy</i></button>');
})
//Reset mục tiêu nghề nghiệp
$(document).on('click','#reset_target',function(){
    $('textarea[name="target"]').html('');
})
//Gửi dữ liệu từ form mục tiêu nghề nghiệp
$(document).on('click','#submit_target',function(){
    var target=$('textarea[name="target"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'target',
        'value': {
            'target': target
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            var form_target='<label for="inputEmail3" class="col-sm-2 control-label">Mục tiêu</label><div class="col-sm-10"><textarea name="target" class="form-control" rows="10"  placeholder="Mục tiêu nghề nghiệp" required disabled>'+res.content['target']+'</textarea><span id="target_error" class="error"></span></div></div><div id="button_target" class="button-custom"><button id="edit_target" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button></div>';
            $('#target').html(form_target);
        }
    })
})


//Thêm mục kinh nghiệp làm việc
$('#add_experience').click(function(){
    $('#add_experience').addClass('hidden');
    var form_experience='<div id="form_experience"><div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Công ty</label> <div class="col-sm-10"> <input name="experience_name_company" type="text" class="form-control" id="address" placeholder="Tên công ty" value="" required></div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Chức danh</label> <div class="col-sm-10"> <input name="experience_title" type="text" class="form-control" id="address" placeholder="Chức vụ" value="" required></div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Thời gian làm việc</label> <div class="col-sm-10"> <input name="experience_time" type="number" class="form-control datepicker" id="experience_time" placeholder="Thời gian làm việc tính bằng tháng" value="" required> </div> </div><div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Mô tả công việc</label> <div class="col-sm-10"> <textarea name="experience_desc" class="form-control" rows="10" placeholder="Sơ lược về hồ sơ" required></textarea></span> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Thành tích đạt được </label> <div class="col-sm-10"> <textarea name="experience_medal" class="form-control" rows="10" placeholder="Thành tích"></textarea></div> </div> <div class="button-custom"><button id="submit_experience" type="button" class="btn btn-danger btn-lg"><i class="fa fa-save">Lưu</i></button><button id="reset_experience" type="button" class="btn btn-default btn-lg"><i class="fa fa-remove">Hủy</i></button></div></div>';
    $('#experience').append(form_experience);
})
//Reset mục tiêu nghề nghiệp
$(document).on('click','#reset_experience',function(){
    $('#add_experience').removeClass('hidden');
    $('#form_experience').remove();
})
//Sửa kinh nghiệm
$(document).on('click','.edit_experience',function(){
    //Thêm form
    var data_id=$(this).attr("data-edit");
    var data={
        '_token': token,
        'id': id,
        'name': 'get_experience_edit',
        'value': {
            'data_id': data_id
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            var form_experience='<div id="form_experience"><div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Công ty</label> <div class="col-sm-10"> <input name="experience_name_company" type="text" class="form-control" id="address" placeholder="Tên công ty" value="'+res.content['experience_name_company']+'" required></div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Chức danh</label> <div class="col-sm-10"> <input name="experience_title" type="text" class="form-control" id="address" placeholder="Chức vụ" value="'+res.content['experience_title']+'" required></div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Thời gian làm việc</label> <div class="col-sm-10"> <input name="experience_time" type="number" class="form-control datepicker" id="experience_time" placeholder="Thời gian làm việc tính bằng tháng" value="'+res.content['experience_time']+'" required> </div> </div><div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Mô tả công việc</label> <div class="col-sm-10"> <textarea name="experience_desc" class="form-control" rows="10" placeholder="Sơ lược về hồ sơ" required>'+res.content['experience_desc']+'</textarea></span> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Thành tích đạt được </label> <div class="col-sm-10"> <textarea name="experience_medal" class="form-control" rows="10" placeholder="Thành tích">'+res.content['experience_medal']+'</textarea></div> </div> <div class="button-custom"><button id="submit_edit_experience" data-edit="'+data_id+'" type="button" class="btn btn-danger btn-lg"><i class="fa fa-save" >Lưu</i></button><button id="reset_experience" type="button" class="btn btn-default btn-lg"><i class="fa fa-remove">Hủy</i></button></div></div>';
            $('#experience').append(form_experience);
        }
    })
})
//Lưu dữ liệu sửa
$(document).on('click','#submit_edit_experience',function(){
    var data_id=$(this).attr("data-edit");
    var experience_name_company=$('input[name="experience_name_company"]').val();
    var experience_title=$('input[name="experience_title"]').val();
    var experience_time=$('input[name="experience_time"]').val();
    var experience_desc=$('textarea[name="experience_desc"]').val();
    var experience_medal=$('textarea[name="experience_medal"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'set_experience_edit',
        'value': {
            'experience_name_company': experience_name_company,
            'experience_title': experience_title,
            'experience_time': experience_time,
            'experience_desc': experience_desc,
            'experience_medal': experience_medal,
            'data_id': data_id
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            location.reload();
        }
    })
})
//Xóa kinh nghiệm
$(document).on('click','.remove_experience',function(){
    var data_id=$(this).attr("data-remove");
    var data={
        '_token': token,
        'id': id,
        'name': 'experience_remove',
        'value': {
            'data_id': data_id
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('div.list_collapse[data-remove="'+data_id+'"]').remove();
        }
    })
})
//Gửi dữ liệu từ form mục tiêu nghề nghiệp
$(document).on('click','#submit_experience',function(){
    var experience_name_company=$('input[name="experience_name_company"]').val();
    var experience_title=$('input[name="experience_title"]').val();
    var experience_time=$('input[name="experience_time"]').val();
    var experience_desc=$('textarea[name="experience_desc"]').val();
    var experience_medal=$('textarea[name="experience_medal"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'experience',
        'value': {
            'experience_name_company': experience_name_company,
            'experience_title': experience_title,
            'experience_time': experience_time,
            'experience_desc': experience_desc,
            'experience_medal': experience_medal
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#add_experience').removeClass('hidden');
            var form_target='<div class="list_collapse" data-remove="'+res.content['last_key']+'"> <div class="header_list"> <h3>'+experience_name_company+'</h3> <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#experience_'+res.content['last_key']+'"><i class="fa fa-sort-desc"> Mở rộng</i></button><button data-edit="'+res.content['last_key']+'" type="button" class="btn btn-default btn-sm edit_experience"><i class="fa fa-edit"> Sửa</i></button> <button type="button" data-remove="'+res.content['last_key']+'" class="btn btn-default btn-sm remove_experience">Xóa</button> </div> <table id="experience_'+res.content['last_key']+'" class="show_data_profile_form collapse"> <tr> <td><p>Tên công ty:</p></td> <td><p><span>'+experience_name_company+'</span><p></td> </tr> <tr> <td><p>Chức vụ:</p></td> <td><p><span>'+experience_title+'</span><p></td> </tr> <tr> <td><p>Thời gian làm việc:</p></td> <td><p><span>'+experience_time+' tháng</span><p></td> </tr> <tr> <td><p>Mô tả công việc:</p></td> <td><p><span>'+experience_desc.substring(0,50)+'..</span><p></td> </tr> <tr> <td><p>Thành tích đạt được:</p></td> <td><p><span>'+experience_medal.substring(0,50)+'...</span><p></td> </tr> </table> </div>';
            $('.list_collapse_experience').last().append(form_target);
            $('#form_experience').remove();
        }
    })
})

//Thêm trình độ
$(document).on('click','#add_level',function(){
    var data={
        '_token': token,
        'id': id,
        'name': 'get_form_level'
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#level').html(res.content);
        }
    })
})
//reset trình độ
$(document).on('click','#reset_level',function(){
    var data={
        '_token': token,
        'id': id,
        'name': 'reset_form_level'
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#level').html(res.content);
        }
    })
})
//Thêm trình độ
$(document).on('click','#submit_level',function(){
    var name_level=$('select[name="name_level"]').val();
    var tranning_unit_level=$('input[name="tranning_unit_level"]').val();
    var specialized_level=$('input[name="specialized_level"]').val();
    var type_level=$('select[name="type_level"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'submit_level',
        value:{
            'name_level':name_level,
            'tranning_unit_level':tranning_unit_level,
            'specialized_level':specialized_level,
            'type_level':type_level
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#level').html(res.content);
        }
    })
})
//Sửa bằng cấp
$(document).on('click','.edit_level',function(){
    //Thêm form
    var data_id=$(this).attr("data-edit");
    var data={
        '_token': token,
        'id': id,
        'name': 'get_level_edit',
        'value': {
            'data_id': data_id
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#level').html(res.content);
        }
    })
})
//Submit Sửa bằng cấp
$(document).on('click','#submit_edit_level',function(){
    //Thêm form
    var data_id=$(this).attr("data-edit");
    var name_level=$('select[name="name_level"]').val();
    var tranning_unit_level=$('input[name="tranning_unit_level"]').val();
    var specialized_level=$('input[name="specialized_level"]').val();
    var type_level=$('select[name="type_level"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'submit_edit_level',
        value:{
            'name_level':name_level,
            'tranning_unit_level':tranning_unit_level,
            'specialized_level':specialized_level,
            'type_level':type_level,
            'data_id': data_id
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#level').html(res.content);
        }
    })
})
//Xóa dữ liệu
$(document).on('click','.remove_level',function(){
    //Thêm form
    var data_id=$(this).attr("data-remove");
    var data={
        '_token': token,
        'id': id,
        'name': 'remove_level',
        'value': {
            'data_id': data_id
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#level').html(res.content);
        }
    })
})
//Lấy form trình độ tiếng anh
$(document).on('click','#add_english',function(){
    var data={
        '_token': token,
        'id': id,
        'name': 'get_form_english'
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#english').html(res.content);
        }
    })
})
//Submit form trình độ tiếng anh
$(document).on('click','#add_new_english',function(){
    var english=$('textarea[name="english"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'add_new_english',
        'value': {
            'english': english
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#english').html(res.content);
        }
    })
})
//Lầy form sửa trình độ tiếng anh
$(document).on('click','#edit_english',function(){
    var data={
        '_token': token,
        'id': id,
        'name': 'edit_english'
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#english').html(res.content);
        }
    })
})

//Kĩ năng và sở trường
//Lấy form kĩ năng sở trường
$(document).on('click','#add_advantages',function(){
    var data={
        '_token': token,
        'id': id,
        'name': 'get_form_advantages'
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#advantages').html(res.content);
        }
    })
})
//Submit form trình độ tiếng anh
$(document).on('click','#add_new_advantages',function(){
    var advantages=$('textarea[name="advantages"]').val();
    var data={
        '_token': token,
        'id': id,
        'name': 'add_new_advantages',
        'value': {
            'advantages': advantages
        }
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#advantages').html(res.content);
        }
    })
})
//Lầy form sửa trình độ kĩ năng sở trường
$(document).on('click','#edit_advantages',function(){
    var data={
        '_token': token,
        'id': id,
        'name': 'edit_advantages'
    };
    $.post('https://findjobiuh.000webhostapp.com/ung-vien/them-ho-so.html',data,function(data){
        var res=JSON.parse(data);
        if(res.status==404)
        {
            alert(res.content);
        }else
        {
            $('#advantages').html(res.content);
        }
    })
})