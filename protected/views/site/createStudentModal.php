<div class="modal fade" id="studentAddModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="container-fluid" id="modal">
                <div class="studentAdding">
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="groupName">Group Name</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="error">
                                <span class="errorName"></span>
                            </div>
                            <input type="text" name="groupName" class="groupName" title="groupName" required>
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="incomingTest">Incoming test</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="error">
                                <span class="errorTest"></span>
                            </div>
                            <input type="text" name="incomingTest" class="incomingTest" title="incomingTest" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="firstName">First name</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <input type="text" name="firstName" class="firstName" title="firstName" required>
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="entryScore">Entry score</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="error">
                                <span class="errorDate"></span>
                            </div>
                            <input type="text" name="entryScore" class="entryScore" title="entryScore" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="lastName">Last name</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <input type="text" name="lastName" class="lastName" title="lastName" required>
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="approvedBy">Approved by:</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <select class="approvedBy" title="approvedBy">
                                <option>Not approved</option>
                                <option>Custom approve</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="engLevel">English level</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="engLevel-container">
                                <select class="engLevel" title="engLevel">
                                    <option>Advanced</option>
                                </select>
                                <div class="engLevel-selects-container">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12">

                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="error">
                                <span class="error"></span>
                            </div>
                            <input type="text" class="customerExpert" title="customerExpert">
                            <div class="customerExpert-container">
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="photo">Photo</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="file-container">
                                <button type="button" class="photo">Browse</button>
                                <div class="photo-container">
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <label for="cv">CV</label>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="error">
                                <span class="errorCv"></span>
                            </div>
                            <button type="button" class="cv">Browse</button>
                            <div class="cv-container">
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="button-area">
                        <button type="button" class="submit">
                            <span class="glyphicon glyphicon-ok"></span>
                        </button>
                        <button type="button" class="close-modal" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>