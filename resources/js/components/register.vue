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
    </label>

    <label for="first_name">
      <input
        id="first_name"
        type="text"
        name="first_name"
        placeholder="john"
        v-model="fields.first_name"
      />
    </label>

    <label for="last_name">
      <input
        id="last_name"
        type="text"
        name="last_name"
        placeholder="doe"
        v-model="fields.last_name"
      />
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
      fields: {
        email: "",
        first_name: "",
        last_name: ""
      }
    };
  },
  methods: {
    submit: function() {
      axios.post(this.action, this.fields).then(response => {
        console.log(response.data);
      });
    }
  }
};
</script>