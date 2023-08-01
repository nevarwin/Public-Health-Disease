<?php
include('landingPageChart.php');

$diseaseDesc = [
    "Disease Information" => "Here, you'll find valuable insights into a wide range of diseases that impact human health. Our mission is to empower individuals with knowledge, enabling them to make informed decisions about their well-being. We strive to provide accurate and reliable information to help you stay informed and take charge of your health journey.",

    "Dengue" => "Dengue viruses are spread to people through the bite of an infected Aedes species (Ae. aegypti or Ae. albopictus) mosquito. Almost half of the world’s population, about 4 billion people, live in areas with a risk of dengue. Dengue is often a leading cause of illness in areas with risk. Dengue viruses are spread to people through the bite of an infected Aedes species (Ae. aegypti or Ae. albopictus) mosquito. These mosquitoes also spread Zika, chikungunya, and other viruses.Dengue is caused by one of any of four related viruses: Dengue virus 1, 2, 3, and 4.  For this reason, a person can be infected with a dengue virus as many as four times in his or her lifetime.",

    "ChikV" => "Is spread to people by the bite of an infected mosquito. The most common symptoms of infection are fever and joint pain. Other symptoms may include headache, muscle pain, joint swelling, or rash.Outbreaks have occurred in countries in Africa, Americas, Asia, Europe, and the Caribbean, Indian and Pacific Oceans. There is a risk the virus will be spread to unaffected areas by infected travelers. There is currently no vaccine to prevent or medicine to treat chikungunya virus infection.",

    "Hepatitis" => "Hepatitis means inflammation of the liver. The liver is a vital organ that processes nutrients, filters the blood, and fights infections. When the liver is inflamed or damaged, its function can be affected. Heavy alcohol use, toxins, some medications, and certain medical conditions can cause hepatitis. The most common types of viral hepatitis are hepatitis A, hepatitis B, and hepatitis C.",

    "Influenza" => "Influenza (flu) can cause mild to severe illness, and at times can lead to death. Flu symptoms usually come on suddenly.",

    "HFMD" => "Hand, foot, and mouth disease is common in children under 5 years old, but anyone can get it. The illness is usually not serious, but it is very contagious. It spreads quickly at schools and day care centers. Transmission. Hand, foot, and mouth disease spreads easily.",

    "Leptospirosis" => "Leptospirosis is a bacterial disease that affects humans and animals. It is caused by bacteria of the genus Leptospira. In humans, it can cause a wide range of symptoms, some of which may be mistaken for other diseases. Some infected persons, however, may have no symptoms at all.",

    "Measles" => "Measles is a childhood infection caused by a virus. Once quite common, measles can now almost always be prevented with a vaccine.",

    "Meningitis" => "Meningitis is an inflammation (swelling) of the protective membranes covering the brain and spinal cord. A bacterial or viral infection of the fluid surrounding the brain and spinal cord usually causes the swelling. However, injuries, cancer, certain drugs, and other types of infections also can cause meningitis. It is important to know the specific cause of meningitis because the treatment differs depending on the cause.",

    "Rabies" => "Rabies is a preventable viral disease most often transmitted through the bite of a rabid animal. The rabies virus infects the central nervous system of mammals, ultimately causing disease in the brain and death. The vast majority of rabies cases reported to the Centers for Disease Control and Prevention (CDC) each year occur in wild animals like bats, raccoons, skunks, and foxes, although any mammal can get rabies.",

    "Typhoid" => "Typhoid fever is a bacterial infection that can spread throughout the body, affecting many organs. Without prompt treatment, it can cause serious complications and can be fatal.It's caused by a bacterium called Salmonella typhi, which is related to the bacteria that cause salmonella food poisoning.",

];

$indexedArray = array_values($diseaseDesc);
$diseaseTitle = 'Disease Information';
$diseaseInfo = 'you\'ll find concise and reliable descriptions of various diseases. Stay informed and take charge of your health!';

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

                        // foreach ($pieDropdown as $key => $value) {
                        //     $selected = ($key == $pieSelectedDisease) ? 'selected' : '';
                        //     echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                        // }

                        include("connection.php");
                        $result = mysqli_query($con, 'SELECT * FROM diseases GROUP BY disease ASC');

                        // Display each disease in a dropdown option
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['diseaseId'] == $pieSelectedDisease) ? 'selected' : '';
                            echo '<option value="' . $row['diseaseId'] . '" ' . $selected . '>' . $row['disease'] . '</option>';
                        }
                        if (isset($pieDropdown[$pieSelectedDisease])) {
                            $diseaseTitle = $pieDropdown[$pieSelectedDisease];
                        } else {
                            $diseaseTitle = 'Disease Information';
                        }
                        ?>
                    </select>
                </div>
                <div class="dropdown mx-2">
                    <select class="form-select" name="pieYear">
                        <?= $options ?>
                    </select>
                </div>
                <button type="submit" class='btn btn-primary mx-2'>Check</button>
            </div>
        </form>
    </div>
</div>
<?php
// echo gettype($diseaseDesc[$diseaseTitle]);

if (isset($diseaseDesc[$diseaseTitle])) {
    $diseaseInfo = $diseaseDesc[$diseaseTitle];
} else if ($diseaseDesc['Disease Information']) {
    $diseaseInfo = $diseaseDesc['Disease Information'];
}
?>

<div class="row align-items-center card text-dark bg-light">
    <h5 class="card-header"><?= $diseaseTitle ?></h5>
    <div class="card-body text-center text-dark bg-light">
        <p class="card-text" style="text-align: justify;"><?= $diseaseInfo ?></p>
    </div>
</div>