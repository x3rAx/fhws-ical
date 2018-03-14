new Vue({
  el: '#app',
  data: {
    target: 'https://fiw.fhws.de/fileadmin/share/vlplan/iCal/BaInf1_2017ws.ics',
    url: ''
  },
  created: function() {
    this.updateUrl();
  },
  watch: {
    target: function() {
      this.updateUrl();
    }
  },
  methods: {
    updateUrl: function() {
      if (!/^http[s]*:\/\/fiw\.fhws\.de\/fileadmin\/share\/vlplan\/iCal\/[^\/]+.ics$/.test(this.target)) {
        this.url = '';
      } else {
        // Get filename
        var filename = this.target.split('/').splice(-1)[0];

        this.url = 'http://fhws-ical.x3ro.net/' + filename;
      }
    }
  }
});

