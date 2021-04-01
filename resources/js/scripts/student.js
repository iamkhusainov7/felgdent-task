export default function (form, onFinishCallback) {
   form.steps({
      headerTag: "h3",
      bodyTag: "fieldset",
      transitionEffect: "slideLeft",
      onStepChanging: function (event, currentIndex, newIndex) {
         // Allways allow previous action even if the current form is not valid!
         if (currentIndex > newIndex) {
            return true;
         }
         // Forbid next action on "Warning" step if the user is to young
         if (newIndex === 3 && Number($("#age-2").val()) < 18) {
            return false;
         }
         // Needed in some cases if the user went back (clean up)
         if (currentIndex < newIndex) {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
         }
         form.validate().settings.ignore = ":disabled,:hidden";
         return form.valid();
      },
      onStepChanged: function (event, currentIndex, priorIndex) {
         // Used to skip the "Warning" step if the user is old enough.
         if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
            form.steps("next");
         }
         // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
         if (currentIndex === 2 && priorIndex === 3) {
            form.steps("previous");
         }
      },
      onFinishing: function (event, currentIndex) {
         form.validate().settings.ignore = ":disabled";
         return form.valid();
      },
      onFinished: onFinishCallback
   }).validate({
      errorElement: 'span',
      errorClass: "mdl-textfield__error",
   });

   $('#group_id, #parent').select2({
      theme: "material",
      allowClear: true,
   });

   flatpickr(`.datetime`, {
      dateFormat: "d.m.Y",
      allowInput: true,
      onOpen: function (selectedDates, dateStr, instance) {
         instance.setDate(instance.input.value, false);
      },
   });


   $('body').find(`.select2-language`).select2({
      theme: "bootstrap",
      allowClear: true,
      placeholder: "Select language..."
   });

   $('#add-more-language').on('click', function () {
      const count = $('.languages').length;
      const languages = $('#language-id-0').find('option').clone();
      const element = `
       <div class="languages">
         <hr>
           <div class="row">
               <div class="col-lg-6 p-t-20">
                   <div class="form-group">
                       <label for="language-id-${count}" class="control-label">Language<span class="required" aria-required="true"> * </span></label>
                       <select data-rule-required="true" class="form-control" id="language-id-${count}" name="language[${count}][language_id]">
                           ${languages}
                       </select>
                   </div>
               </div>
               <div class="col-lg-6 p-t-20">
                   <div class="form-group">
                       <label for="language-level-${count}" class="control-label">language level</label>
                       <select data-rule-required="true" class="form-control" id="language-level-${count}" name="language[${count}][level]">
                           <option value="">Select level...</option>
                           <option value="Native">Native</option>'A0', 'A1', 'B1', 'B2', 'C1', 'C2', 'Native'
                           <option value="A0">A0</option>
                           <option value="A1">A1</option>
                           <option value="B1">B1</option>
                           <option value="B2">B2</option>
                           <option value="C1">C1</option>
                           <option value="C2">C2</option>
                       </select>
                   </div>
               </div>
               <div class="form-group mt-5">
                   <div class="btn-group">
                       <a href="#" class="btn btn-info btn-rounded btn-remove" data-remove-item="language"><i class="fa fa-remove"></i>Delete</a>
                   </div>
               </div>
           </div>
       </div>`;

      $('#language').append(element);

      languages.appendTo(`#language-id-${count}`);

      $('body').find(`#language-id-${count}`).select2({
         theme: "bootstrap",
         allowClear: true,
         placeholder: "Select language"
      });
   });

   $(document).on('click', 'body .btn-remove', function () {
      const element = $(this).parents()[2];
      element.remove();
   });
};

