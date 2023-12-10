<div class="alert alert-success alert-dismissible text-white mt-3" role="alert">
    <span class="text-sm">Welcome! New Student</span>
    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
</div>
<div class="row mt-4 justify-content-center">
    <div class="col-lg-8 col-md-12 mt-4 mb-4">
        <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-dark border-radius-lg py-3 pe-1">
            <h6 class="mb-0 text-center text-white">PERSONAL INFORMATION SHEET</h6>
            </div>
        </div>
        <div class="card-body">
        <form role="form" class="text-start" action="assets/php/config.php" method="POST">
            <label class="input-label text-md font-weight-bold">A. Panuto: Sagutan and mga sumusunod na tanong.</label>
            <div class="row mt-2">
            <label class="input-label text-md">1. Ano ang iyong pangalan?</label>
            <div class="col-sm-4">
                <div class="input-group input-group-outline e mb-3">
                <label class="form-label">Unang Pangalan</label>
                <input required type="text" name="f_name" class="form-control ml-3" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                <label class="form-label">Gitnang Pangalan (lagpasan kung wala)</label>
                <input type="text" name="m_name" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                <label class="form-label">Apelyido</label>
                <input required type="text" name="l_name" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">2. Ano ang iyong kasarian? Lagyan ng tsek (✔) and tamang kahon.</label>
            <div class="col-sm-3">
                <div class="form-check mb-3">
                <input required class="form-check-input" type="radio" value="Male" name="gender" id="gender">
                <label class="form-label" for="gender">Lalake</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-check mb-3">
                <input required class="form-check-input" type="radio" value="Female" name="gender" id="gender">
                <label class="form-label" for="gender">Babae</label>
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">3. Kailan ka isinilang o ipinanganak?</label>
            <div class="col-4">
                <div class="input-group input-group-outline mb-3">
                <select required class="form-select p-2 border-secondary opacity-5" name="birth_month">
                    <option value="">Buwan</option>
                    <?=$OptionsMonths?>
                </select>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group input-group-outline mb-3">
                <select required class="form-select p-2 border-secondary opacity-5" name="birth_day">
                    <option value="">Araw</option>
                    <?=$OptionsDays?>
                </select>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group input-group-outline mb-3">
                <select required class="form-select p-2 border-secondary opacity-5" name="birth_year">
                    <option value="">Taon</option>
                    <?=$OptionsYears?>
                </select>
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">4. Saan ka nakatira?</label>
            <div class="col-sm-3">
                <div class="input-group input-group-outline mb-3">
                <label class="form-label">Numero ng bahay/kalye</label>
                <input required type="text" name="addrss_num" class="form-control ml-3" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group input-group-outline mb-3">
                <label class="form-label">Barangay</label>
                <input required type="text" name="addrss_brgy" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group input-group-outline mb-3">
                <label class="form-label">Lungsod/Bayan</label>
                <input required type="text" name="addrss_city" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group input-group-outline mb-3">
                <label class="form-label">Probinsya</label>
                <input required type="text" name="addrss_province" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">5. Ano ang iyong relihiyon?</label>
            <div class="col-sm-3">
                <div class="input-group input-group-outline mb-3">
                    <select required class="form-select p-2 border-secondary opacity-5" name="religion">
                        <option value="">Pumili ng relihiyon</option>
                        <option value="Born Again">Born Again</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                        <option value="Islam">Islam</option>
                        <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Other">Others</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">6. Ano ang estado mo sa buhay? Lagyan ng tsek (✔) ang tamang kahon.</label>
            <div class="col-sm-6 col-md-3">
                <div class="form-check mb-3">
                <input class="form-check-input" type="radio" value="Walang asawa" name="civil_status" id="civil_status">
                <label class="form-label" for="civil_status">Walang asawa</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-check mb-3">
                <input required class="form-check-input" type="radio" value="May-asawa" name="civil_status" id="civil_status">
                <label class="form-label" for="civil_status">May-asawa</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-check mb-3">
                <input required class="form-check-input" type="radio" value="Biyudo/Biyuda" name="civil_status" id="civil_status">
                <label class="form-label" for="civil_status">Biyudo / Biyuda</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-check mb-3">
                <input required class="form-check-input" type="radio" value="Hiwalay sa asawa" name="civil_status" id="civil_status">
                <label class="form-label" for="civil_status">Hiwalay sa asawa</label>
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">7. Ano ang hanapbuhay/trabaho mo?</label>
            <div class="col-md-6 col-sm-12">
                <div class="input-group input-group-outline mb-3">
                <input required type="text" name="occupation" class="form-control"
                    onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md">8. Ano ang pinakamataas na antas na natapos mo sa pag-aaral?</label>
            <div class="col-md-6 col-sm-12">
                <div class="input-group input-group-outline mb-3">
                <input required type="text" name="high_educ" class="form-control"
                    onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            </div>
            <div class="row mt-2">
            <label class="input-label text-md font-weight-bold">
                B. Panuto: Sumulat ng isang talata na binubuo ng dalawa hanggang tatlong pangungusap tungkol sa iyong sarili, gayundin ang mga ambisyon mo.
            </label>
            <div class="col-md-12 col-sm-12">
                <div class="input-group input-group-outline mb-3">
                <textarea required style="resize: none;" class="form-control" name="about_student" rows="5"></textarea>
                </div>
            </div>
            </div>
            
            <div class="row mt-2">
            <div class="col-md-12 col-sm-12 text-end">
                <button class="btn bg-gradient-success my-2" type="submit" value="<?=$_SESSION['StudentLRN']?>" name="submit_PIS">
                <i class="material-icons text-sm">check</i>&nbsp&nbsp
                Submit
                </button>
            </div>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>