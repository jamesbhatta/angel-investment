<template>
  <div>
    <div class="row text-center">
      <div v-for="industry in industries" v-bind:key="industry.id" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img-show-div mt-4">
        <div class="box-model">
          <img :src="industry.image_url" />
          <a href="" title="Software" class="overlay-link">
            <div class="overlay-link-wrap">
              <span> {{ industry.title }} </span>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="text-center">
      <div class="ain-hide" id="home-all-category-js">
        <div class="loading"></div>
      </div>
      <div v-on:click="loadData(1000)" class="p-5 view-all js-all-categories-home"><span class="editableLabel" labelid="home_page:view_all_cat">View more industry categories</span></div>
    </div>
    
  </div>
</template>
<script>
export default {
  data() {
    return {
      industries: [],
      loadCount: 2,
    };
  },

  created() {
    this.loadData(this.loadCount);
  },

  methods: {
    loadData(loadCount) {
      axios.get("/api/industry/list", {
          params: {
              'limit': loadCount,
          }
      }).then((response) => {
        console.log(response.data);
        this.industries = response.data;
      });
    },
  },
};
</script>
