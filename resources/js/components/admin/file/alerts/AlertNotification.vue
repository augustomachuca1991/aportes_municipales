<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div v-if="hasAlert">
        <div
          class="callout callout-warning mb-1 text-danger"
          style="background-color: #fff3cd"
          v-for="(alert, index) in alerts"
          :key="index"
        >
          <!-- {{ alert.data }} -->
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-hidden="true"
            @click="markAsRead(index, alert)"
          >
            ×
          </button>
          <h5>
            <i class="icon fas fa-exclamation-triangle"></i>
            Atencion!!!
            <i class="text-bold">"{{ alert.data.fileName }}"</i> tuvo los
            siguentes fallos:
          </h5>
          La fila <b>"{{ alert.data.row }}"</b>
          <span v-for="(error, index) in alert.data.errors" :key="index">
            {{ error }}</span
          >
          y se recibió un valor "{{ alert.data.values }}"
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const apiUrl = "http://aportes.test/api/users/notifications";
import ApiAuth from '../../../../apiAuth';
export default {
  props: ["auth"],
  data: function () {
    return {
      alerts: [],
      hasAlert: false,
    };
  },
  mounted() {
    this.getAlert();
  },
  methods: {
    getAlert() {
      axios.get(`${apiUrl}/${this.auth}`).then((response) => {
        console.log(response.data.lenght);
        let alerts = response.data;
        if (alerts.length) {
          this.hasAlert = true;
          this.alerts = alerts;
        }
      });
    },
    markAsRead(index, alert) {
      const params = {
        alert_id: alert.id,
        user_id: this.auth,
      };
      axios.post(`${apiUrl}/mark-as-read`, params).then((response) => {
        //this.alerts = response.data;
        if (response.status == 200) {
          this.alerts.splice(index, 1);
        }
      });
    },
  },
};
</script>
