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
        <h5 class="modal-title" id="exampleModalLongTitle">GENERAL WAIVER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <label for="terms">We, the undersigned, certify that we have allowed our child, whose name appears above, 
          to join the April 2019 Shibata Shogo Baseball Clinic voluntarily and of our and his/her own free will. 
          We shall not hold the organizers, as well as their representatives, employees, and staff, liable civilly, 
          criminally nor administratively, or financially, should any injury, loss, impairment or any unfortunate incident 
          happen to our child on the occasion of his voluntary participation in this clinic. We hereby release, relieve and exempt 
          said parties from any and all responsibilities and liabilities. We, the undersigned, my child, and all other members of 
          our family agree to be bound by the rules, regulations, schedules, and guidelines of Shibata Shogo Baseball Class.</label>
          <input type="text" name="terms" class="form-control" value="I Agree" hidden>
      </div>
      <div class="form-group">
          <label for="terms">Please read the waiver above.</label><br>
          <label>You must type "I Agree" to continue</label>
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