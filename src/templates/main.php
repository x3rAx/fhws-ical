<form>
  <div class="form-group">
    <label for="form-target">iCal URL from <a href="https://fiw.fhws.de/" target="_blank">fwi.fhws.de</a></label>
    <input type="text" v-model="target" id="form-target" class="form-control" />
  </div>
  <div class="form-group">
    <label for="form-url">iCal URL with fixed encoding</label>
    <input type="text" :value="url" id="form-url" class="form-control" disabled />
    <small class="form-text text-muted"><a :href="url">Open</a></small>
  </div>
</form>
