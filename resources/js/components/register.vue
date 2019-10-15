<template>
  <div>
    <h2>Sign up to our Newsletter</h2>

    <label for="email">
      <input
        id="email"
        type="text"
        name="email"
        placeholder="john.doe@example.com"
        v-model="fields.email"
      />
      <p v-if="errors.email">
        <span v-for="(error, index) in errors.email" v-bind:key="index">{{ error }}</span>
      </p>
    </label>

    <label for="first_name">
      <input
        id="first_name"
        type="text"
        name="first_name"
        placeholder="john"
        v-model="fields.first_name"
      />
      <p v-if="errors.first_name">
        <span v-for="(error, index) in errors.first_name" v-bind:key="index">{{ error }}</span>
      </p>
    </label>

    <label for="last_name">
      <input
        id="last_name"
        type="text"
        name="last_name"
        placeholder="doe"
        v-model="fields.last_name"
      />
      <p v-if="errors.last_name">
        <span v-for="(error, index) in errors.last_name" v-bind:key="index">{{ error }}</span>
      </p>
    </label>

    <button v-on:click="submit()">Sign up</button>
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
      }
    };
  },
  methods: {
    submit: function() {
      axios
        .post(this.action, this.fields)
        .then(response => {
          console.log(response.data);

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