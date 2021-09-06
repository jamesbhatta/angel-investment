<template>
  <div>
    <form @submit.prevent="submit">
      <div v-show="message" class="alert alert-success" :class="messageClass">{{ message }}</div>

      <div class="mb-3">
        <label class="form-label">Old Password</label>
        <input type="text" v-model="form.current_password" class="form-control" placeholder="Current Password" />
        <invalid-feedback :message="form.errors.first('current_password')"></invalid-feedback>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" v-model="form.password" class="form-control" placeholder="New Password" />
        <invalid-feedback :message="form.errors.first('password')"></invalid-feedback>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" v-model="form.password_confirmation" class="form-control" placeholder="Confirm New Password" />
      </div>

      <div class="mb-3">
        <button class="btn btn-primary px-4" :disabled="form.processing">
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
  data() {
    return {
      messageClass: null,
      message: null,

      form: new Form({
        current_password: null,
        password: null,
        password_confirmation: null,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .put("/api/change-password")
        .then((response) => {
          console.log(response);
          this.messageClass = "alert-success";
          this.message = "Information saved";
        })
        .catch((error) => {
          console.log(error);
          this.messageClass = "alert-danger";
          if (error.response.status == 412) {
            this.message = error.response.data.message;
          } else {
            this.message = "Whoops!! Something went wrong.";
          }
        });
    },
  },
};
</script>