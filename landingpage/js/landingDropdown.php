<?php
include('landingPageChart.php');
?>
<!-- form dropdown for both line and pie chart -->
<div class="d-flex justify-content-center">
    <div class="row align-items-center">
        <form id="form2">
            <div class="btn-group col-xl-12 col-lg-12  col-sm-8 my-2">
                <div class="dropdown mx-2">
                    <select class="form-select" name="pieDisease">
                        <?php
                        $pieDropdown = [
                            1 => 'Amebiasis',
                            2 => 'Adverse Event Following Immunization',
                            3 => 'Acute encephalitis syndrome',
                            4 => 'Alpha-Fetoprotein',
                            5 => 'Acute Meningitis',
                            6 => 'Chikungunya Virus',
                            7 => 'Diphtheria',
                            8 => 'Hand, Foot, and Mouth Disease',
                            9 => 'Number Needed to Treat',
                            10 => 'Neonatal Tetanus',
                            11 => 'Perthes Disease',
                            12 => 'Influenza',
                            13 => 'Dengue',
                            14 => 'Rabies',
                            15 => 'Cholera',
                            16 => 'Hepatitis',
                            17 => 'Measles',
                            18 => 'Meningitis',
                            19 => 'Meningo',
                            20 => 'Typhoid',
                            21 => 'Leptospirosis',
                        ];
                        $pieSelectedDisease = $_GET['pieDisease'] ?? '';

                        foreach ($pieDropdown as $key => $value) {
                            $selected = ($key == $pieSelectedDisease) ? 'selected' : '';
                            echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="dropdown mx-2">
                    <select class="form-select" name="pieYear">
                        <?php echo $options; ?>
                    </select>
                </div>
                <button type="submit" class='btn btn-primary mx-2'>Check</button>
            </div>
        </form>
    </div>
</div>