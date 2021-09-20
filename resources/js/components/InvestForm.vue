<template>
  <div>
    <form @submit.prevent="submit">
      <div class="mb-3">
        <label class="form-label">Your Name</label>
        <input v-model="form.investor_name" class="form-control">
        <invalid-feedback :message="form.errors.first('investor_name')"></invalid-feedback>
      </div>

      <div class="mb-3">
        <label class="form-label">Your Contact Number</label>
        <input v-model="form.investor_mobile" class="form-control">
        <invalid-feedback :message="form.errors.first('investor_mobile')"></invalid-feedback>
      </div>

      <div class="mb-3">
        <label class="form-label">Your message</label>
        <textarea v-model="form.message" class="form-control" cols="30" rows="10"></textarea>
        <invalid-feedback :message="form.errors.first('message')"></invalid-feedback>
      </div>

      <div class="alert" :class="messageClass">
          {{ message }}
      </div>

      <div class="mb-3">
        <button class="btn btn-primary px-4 text-white" :disabled="form.processing">
          <span v-if="form.processing" class="spinner-border text-white spinner-border-sm" role="status" aria-hidden="true"></span>
          <span class="text-white">Submit</span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "form-backend-validation";

export default {
  props: ["pitch", "submitUrl"],
  data() {
    return {
      messageClass: null,
      message: null,

      form: new Form({
        investor_name: null,
        investor_mobile: null,
        message: null,
      }),
    };
  },

  created() {
  },

  methods: {
      closeModal() {
          $("#investModal").modal("hide");
      },
        showSuccessAlert()
        {
          this.$swal('Done', 'Your investment request has been send successfully. We will reach back to you shortly.', 'success');
        },
    submit() {
      this.form
        .post(this.submitUrl)
        .then((response) => {
          console.log(response);
          this.messageClass = "alert-success";
          this.message = response.message;
          this.closeModal();
          this.showSuccessAlert();
        })
        .catch((error) => {
          this.messageClass = "alert-danger";
          this.message = "Whoops something went wrong.";
        });
    },
  },
};
</script>