<template>
  <div>
    <form @submit.prevent="submit">
      <div v-show="message" class="alert alert-success" :class="messageClass">{{ message }}</div>

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" v-model="form.name" class="form-control" />
        <invalid-feedback :message="form.errors.first('name')"></invalid-feedback>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" v-model="user.email" class="form-control" disabled />
        <invalid-feedback :message="form.errors.first('name')"></invalid-feedback>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" v-model="user.country_name" class="form-control" disabled />
      </div>


      <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" v-model="form.mobile" class="form-control" />
        <invalid-feedback :message="form.errors.first('mobile')"></invalid-feedback>
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
  props: ["user"],
  data() {
    return {
      messageClass: null,
      message: null,

      form: new Form({
        name: null,
        mobile: null,
      }),
    };
  },

  created() {
    console.log(this.user);
    this.form.name = this.user.name;
  },

  methods: {
    submit() {
      this.form
        .put("/api/users/" + this.user.id)
        .then((response) => {
          console.log(response);
          this.messageClass = "alert-success";
          this.message = "Information saved";
        })
        .catch((error) => {
          this.messageClass = "alert-danger";
          this.message = "Whoops something went wrong.";
        });
    },
  },
};
</script>