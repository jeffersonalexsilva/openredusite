jQuery(document).ready(function(){
    var doingAjax = false;
   jQuery('#settings_form').on('submit',function(e){
       e.preventDefault();

       if(doingAjax) return false;

      var form = jQuery('#settings_form'),
          submitBtn = form.find('input[type=submit]'),
          formData = form.serialize();

       jQuery.ajax({
           url: ajaxurl,
           method : 'post',
           data : formData,
           dataType : 'text',
           beforeSend: function(){
               doingAjax = true;
               submitBtn.attr("disabled",'disabled');
               submitBtn.parent().find(".spinner").css("visibility","visible");
           }
       }).always(function(){
           doingAjax = false;
           submitBtn.removeAttr("disabled");
           submitBtn.parent().find(".spinner").css("visibility","hidden");
       }).done(function(response){
           if(response === 'ok'){
               toastr.success('Saved Successfully');
           }else{
               toastr.error('Error while saving');
           }
       }).fail(function(){
           toastr.error('Error while saving');
       });

       return false;
   });

   jQuery('.settings-section-heading').on('click',function(){
        var section = jQuery(this).closest('.settings-section-wrap');
        section.toggleClass('active');



   });

});