
var acceptedTypes = {
    'image/png': true,
    'image/jpeg': true,
    'image/gif': true
};

var allowed_img_width = '100';
var allowed_img_height = '100';
var base_url = 'localhost/foodies/public';





        
$(document).on("click", '.add-images', function (e) {
    $('#item_id').val($(this).data('id'));
e.preventDefault();
$('#drop_zone').live('dragenter', ignoreDrag).live('dragover', ignoreDrag).live('drop', drop);
$('#files').live('change', dropInput);

     		var modalWindow = '<div class="modal hide" id="myModal"><div class="modal-header"><span class="close" data-dismiss="modal"><b>×</b></span><h3>Manage Image</h3></div><div class="modal-body" style="position:relative"><ul class="nav nav-tabs" id="myTab"><li class="active"><a href="#select-photo" data-toggle="tab">Images</a></li><li ><a href="#upload-photos" class="upload-photos" data-toggle="tab">Upload Image</a></li></ul><div class="tab-content"><div class="tab-pane active" id="select-photo"><ul class="thumb-grid five-col" id="select-thumbs"></ul></div><div class="tab-pane " id="upload-photos"><div><div class="pull-left"><input type="file" id="files" name="files[]" multiple style="display:block;" /><h3 style="color:black;">Drop files here <i class="icon-circle-arrow-down"></i></h3></div><div class="pull-right"><button disabled = "disabled" id="upload" class="btn btn-success pull-right" >upload</button></div><div class="alert alert-error hide" id = "errMessage" style="clear:both;"></div></div> <div class="clear"></div><br /><div id="drop_zone"><ul class="thumb-grid five-col" id="list"></ul></div></div></div></div><div class="modal-footer"><small>Powered by Magzter Inc</small><a href="#" class="btn btn-primary" data-dismiss="modal">I am done</a></div></div>';

     	if ($('#myModal').length == 0) {
            $('body').append(modalWindow);

            // if (Modernizr.draganddrop) {
            // //    $("#files").hide();
            // } else {
            //     $("#drop_zone").hide();
            //     // connect events
            // }
        }

            $('#myModal').modal('show');
        });

var template = '<li><img/> <div class="loadingIndicator"></div><div class="progress progress-striped active"><div class="bar"></div></div></li>';
var dropbox = $('#list');
fileQueue = [];

function ignoreDrag(e) {
	e.originalEvent.stopPropagation();
    e.originalEvent.preventDefault();
    e.preventDefault();
    e.stopPropagation();

}

function createImage(file) {
    if (acceptedTypes[file.type] === true) {
        var preview = $(template),
        image = $('img', preview);
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            setTimeout(function () {
                var upImgwidth = img.width;
                var upImgheight = img.height;
                //check image dimension and height
                if (upImgwidth >= allowed_img_width && upImgheight >= allowed_img_height) {
                    image.attr('src', e.target.result);
                    $('#list').prepend(preview);
                    $.data(file, preview);
                    fileQueue.push({
                        file: file,
                        li: preview
                    });
                } else {
                    err = err + 1;
                    $('#errMessage').removeClass('hide');
                    $('#errMessage').html('Image Height and widht should be ' + allowed_img_width + ' X ' + allowed_img_height + '. Skipped (' + err + ') files');
                }
            }, 1000);
        };
        reader.readAsDataURL(file);
    }
}
var files;

function dropInput(e) {

    var dt = e.target;

    files = dt.files;
    var i = 0;
    while (i < dt.files.length) {
        var file = dt.files[i];
        createImage(file);
        
        i = i + 1;
        
    }
    ignoreDrag(e);
    
    
    $('#upload').removeAttr('disabled');
}

function drop(e) {
    console.log(e.target.files);
    var dt = e.originalEvent.dataTransfer;
    files = dt.files;
    var i = 0;
    while (i < dt.files.length) {
        var file = dt.files[i];
        createImage(file);
        i = i + 1;
    }
    ignoreDrag(e);
    
    
    $('#upload').removeAttr('disabled');
}

$(document).on('click', '#upload', function (ev) {
    ev.preventDefault();
    var i = 0;
    while (i < fileQueue.length) {
        var item = fileQueue.pop();
        if (i == fileQueue.length) {
            last = "last";
        } else {
            last = "";
        }
        uploadFile(item.file, item.li, last);
    }
    setTimeout(function () {
        //$('#myTab a:first').tab('show');
        //$('#drop_zone').html('');
    }, 1000);
});

function CloseModal(){

    $('#info').modal('hide');
    $('#BuyModal').modal('hide');
}

function uploadFile(file, li, last) {
    //                console.log(file);
    if (li && file) {
        var formData = new FormData();
        formData.append(file.name, file);
        //	formData.append("AllowedWidth", allowed_img_width);
        //formData.append("AllowedHeight", allowed_img_height);
        //console.log(formData);
        var xhr = new XMLHttpRequest();

        var item_id = parent.document.getElementById('item_id').value;

        var post_path = base_url + "/item/" + item_id + "/upload";
        console.log(post_path);
        //console.log(post_path);

        $.post(post_path, function (data) {
        console.log(data);
    });

        xhr.open('POST', post_path);
        xhr.upload.onprogress = function (ev) {
            if (ev.lengthComputable) {
                var complete = (ev.loaded / ev.total * 100 | 0);
                if (last == "last") {
                    if (complete == 100) {
                        setTimeout(function () {
                            $('#myTab a:first').tab('show');
                            $('#list').html('');
                        }, 1000);
                    }
                }
                li.find(".bar").width((ev.loaded / ev.total) * 100 + "%");
            }
        };
        xhr.send(formData);
    }
}

