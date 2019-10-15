<template>
  <div class="card">
    <div class="card-body">
      <h2 class="card-title">Sign up to our Newsletter</h2>

      <div
        v-if="success"
        class="alert alert-success"
        role="alert"
      >Thank you for signing up to our Newsletter!</div>

      <form v-on:submit.prevent>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            id="email"
            class="form-control"
            type="text"
            name="email"
            placeholder="john.doe@example.com"
            v-model="fields.email"
            required
            :class="{'is-invalid' : errors.email }"
          />
          <div class="invalid-feedback" v-if="errors.email">
            <span v-for="(error, index) in errors.email" v-bind:key="index">{{ error }}</span>
          </div>
        </div>

        <div class="form-group">
          <label for="first_name">First Name</label>
          <input
            id="first_name"
            class="form-control"
            type="text"
            name="first_name"
            placeholder="john"
            v-model="fields.first_name"
            required
            :class="{'is-invalid' : errors.first_name }"
          />
          <div class="invalid-feedback" v-if="errors.first_name">
            <span v-for="(error, index) in errors.first_name" v-bind:key="index">{{ error }}</span>
          </div>
        </div>

        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input
            id="last_name"
            class="form-control"
            type="text"
            name="last_name"
            placeholder="doe"
            v-model="fields.last_name"
            required
            :class="{'is-invalid' : errors.last_name }"
          />
          <div class="invalid-feedback" v-if="errors.last_name">
            <span v-for="(error, index) in errors.last_name" v-bind:key="index">{{ error }}</span>
          </div>
        </div>

        <button class="btn btn-primary" v-on:click="submit()">Sign up</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    action: {
      type: String,
      required: true
    }
  },
  data: function() {
    return {
      errors: {},
      fields: {
        email: "",
        first_name: "",
        last_name: ""
      },
      success: false
    };
  },
  methods: {
    submit: function() {
      axios
        .post(this.action, this.fields)
        .then(response => {
          this.success = true;

          this.reset();
        })
        .catch(exception => {
          if ("response" in exception) {
            this.errors = exception.response.data.errors;
          }
        });
    },
    reset: function() {
      this.errors = {};
      this.fields.email = "";
      this.fields.first_name = "";
      this.fields.last_name = "";
    }
  }
};
</script>