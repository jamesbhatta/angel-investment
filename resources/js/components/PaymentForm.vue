<template>
  <div>
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <input id="card-holder-name" type="text" class="form-control" placeholder="Your Name" />
          </div>

          <div class="mb-3">
            <stripe-element-card ref="elementRef" :pk="publishableKey" @token="tokenCreated"></stripe-element-card>
          </div>

          <div class="mb-3">
            <button id="card-button" type="submit" class="btn btn-primary">Process Payment</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { StripeElementCard } from "@vue-stripe/vue-stripe";
import axios from "axios";

export default {
  components: {
    StripeElementCard,
  },
  data() {
    return {
      publishableKey: "pk_test_51JY4kCEKrW0pMCb3rmvDk384KNaT3QLf9RtuUFef8sEKZLEYTjWhDuTnasbYOLDBty2QqEzwsOVxmvsc2h5ejAvO00hxO5UiPR",
      name: "",
    };
  },
  methods: {
    submit() {
      // this will trigger the process
      this.$refs.elementRef.submit();
    },

    tokenCreated(token) {
      console.log(token);
      // handle the token
      // send it to your server
      axios
        .post("/charge", {
          name: this.name,
          token: token,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
#stripe-element-errors {
    color: red;
    font-size: .9rem;
}
</style>