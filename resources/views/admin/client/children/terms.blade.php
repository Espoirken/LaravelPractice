<!-- Button trigger modal -->
<div class="text-center">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
        Continue
    </button>
</div>
      
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terms and Condition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <label for="terms">
                  PLEASE READ THIS AGREEMENT CAREFULLY. By submitting your application and by your use of the Service, you agree to comply with all of the terms and conditions set out in this Agreement. Website.com may terminate your account at any time, with or without notice, for conduct that is in breach of this Agreement, for conduct that Website.com believes is harmful to its business, or for conduct where the use of the Service is harmful to any other party.
                  
                  Website.com may, in its sole discretion, change or modify this Agreement at any time, with or without notice. Such changes or modifications shall be made effective for all Subscribers upon posting of the modified Agreement to this web address. You are responsible to read this document from time to time to ensure that your use of the Service remains in compliance with this Agreement.</label>
          <input type="text" name="terms" class="form-control" value="I Agree" hidden>
      </div>
      <div class="form-group" id="app">
          <label for="terms">You must type "I Agree" to continue</label>
          <input id="terms" type="text" class="form-control" name="terms_confirmation">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success" type="submit" id="addchild" disabled>Add Child</button>
      </div>
    </div>
  </div>
</div>