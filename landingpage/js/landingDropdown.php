<?php
include('landingPageChart.php');

$diseaseDesc = [
    "Disease Information" => "Here, you'll find valuable insights into a wide range of diseases that impact human health. Our mission is to empower individuals with knowledge, enabling them to make informed decisions about their well-being. We strive to provide accurate and reliable information to help you stay informed and take charge of your health journey.",

    "Dengue" => "Dengue viruses are spread to people through the bite of an infected Aedes species (Ae. aegypti or Ae. albopictus) mosquito. Almost half of the world’s population, about 4 billion people, live in areas with a risk of dengue. Dengue is often a leading cause of illness in areas with risk. Dengue viruses are spread to people through the bite of an infected Aedes species (Ae. aegypti or Ae. albopictus) mosquito. These mosquitoes also spread Zika, chikungunya, and other viruses.Dengue is caused by one of any of four related viruses: Dengue virus 1, 2, 3, and 4.  For this reason, a person can be infected with a dengue virus as many as four times in his or her lifetime.",

    "Amoebiasis" => "Amoebiasis is an intestinal (bowel) illness caused by a microscopic (tiny) parasite called Entamoeba histolytica, which is spread through human feces (poop). Often there are no symptoms, but sometimes it causes diarrhea (loose stool/poop), nausea (a feeling of sickness in the stomach), and weight loss.",

    "Cholera" => "Cholera is an acute diarrheal illness caused by infection of the intestine with Vibrio cholerae bacteria. People can get sick when they swallow food or water contaminated with cholera bacteria. The infection is often mild or without symptoms, but can sometimes be severe and life-threatening.",

    "Adverse Event Following Immunization" => "When adverse events following immunisation (AEFIs) do occur, it is important that they are reported, especially if they are serious, even if they are unlikely to have been caused by the vaccine itself. This ongoing surveillance is essential to ensure vaccine safety.",

    "Acute encephalitis syndrome" => "Encephalitis (en-sef-uh-LIE-tis) is inflammation of the brain. There are several causes, including viral infection, autoimmune inflammation, bacterial infection, insect bites and others. When inflammation is caused by an infection in the brain, it's known as infectious encephalitis. And when it's caused by your own immune system attacking the brain, it's known as autoimmune encephalitis. Sometimes there is no known cause.",

    "Alpha-Fetoprotein" => "An AFP tumor marker test is a blood test that measures the level of AFP (alpha-fetoprotein) in a sample of your blood. It's usually used to help diagnose certain types of cancer and to check how well treatment is working.",

    "Diphtheria" => "Diphtheria is a serious infection caused by strains of bacteria called Corynebacterium diphtheriae that make toxins. It can lead to difficulty breathing, heart rhythm problems, and even death. CDC recommends vaccines for infants, children, teens, and adults to prevent diphtheria.",

    "Neonatal Tetanus" => "Tetanus is an acute infectious disease caused by spores of the bacterium Clostridium tetani. The spores are found everywhere in the environment, particularly in soil, ash, intestinal tracts/feces of animals and humans, and on the surfaces of skin and rusty tools like nails, needles, barbed wire, etc. Being very resistant to heat and most antiseptics, the spores can survive for years.",

    "Perthes Disease" => "Perthes' disease is a condition of the hip joint that tends to affect children between the ages of three and 11 years. The top end of the thigh bone (femur) is shaped like a ball so that it can fit snugly into the hip socket. In the case of Perthes' disease, this ball (femoral head) is softened and eventually damaged due to an inadequate blood supply to the bone cells. Boys are more likely to develop Perthes’s disease than girls. In most cases only one hip joint is affected.",

    "Number Needed to Treat" => "The Number Needed to Treat (NNT) is the number of patients you need to treat to prevent one additional bad outcome (death, stroke, etc.). For example, if a drug has an NNT of 5, it means you have to treat 5 people with the drug to prevent one additional bad outcome.",

    "Acute Meningitis" => "Meningitis is an infection and inflammation of the fluid and membranes surrounding the brain and spinal cord. These membranes are called meninges. The inflammation from meningitis typically triggers symptoms such as headache, fever and a stiff neck.",

    "Chikungunya Virus" => "Is spread to people by the bite of an infected mosquito. The most common symptoms of infection are fever and joint pain. Other symptoms may include headache, muscle pain, joint swelling, or rash.Outbreaks have occurred in countries in Africa, Americas, Asia, Europe, and the Caribbean, Indian and Pacific Oceans. There is a risk the virus will be spread to unaffected areas by infected travelers. There is currently no vaccine to prevent or medicine to treat chikungunya virus infection.",

    "Hepatitis" => "Hepatitis means inflammation of the liver. The liver is a vital organ that processes nutrients, filters the blood, and fights infections. When the liver is inflamed or damaged, its function can be affected. Heavy alcohol use, toxins, some medications, and certain medical conditions can cause hepatitis. The most common types of viral hepatitis are hepatitis A, hepatitis B, and hepatitis C.",

    "Influenza" => "Influenza (flu) can cause mild to severe illness, and at times can lead to death. Flu symptoms usually come on suddenly.",

    "HFMD" => "Hand, foot, and mouth disease is common in children under 5 years old, but anyone can get it. The illness is usually not serious, but it is very contagious. It spreads quickly at schools and day care centers. Transmission. Hand, foot, and mouth disease spreads easily.",

    "Meningo" => "Meningococcal disease refers to any illness caused by bacteria called Neisseria meningitidis. These illnesses are often severe, can be deadly, and include infections of the lining of the brain and spinal cord (meningitis) and bloodstream. ",

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
                <div class="dropdown mx-1">
                    <select class="form-select" name="pieDisease">
                        <?php
                        $pieDropdown = [
                            1 => 'Amoebiasis',
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

                        $result = mysqli_query($con, 'SELECT * FROM diseases GROUP BY disease ASC');

                        // // Display each disease in a dropdown option
                        // while ($row = mysqli_fetch_assoc($result)) {
                        //     $selected = ($row['diseaseId'] == $pieSelectedDisease) ? 'selected' : '';
                        //     echo '<option value="' . $row['diseaseId'] . '" ' . $selected . '>' . $row['disease'] . '</option>';
                        // }
                        if (isset($pieDropdown[$pieSelectedDisease])) {
                            $diseaseTitle = $pieDropdown[$pieSelectedDisease];
                        } else {
                            $diseaseTitle = 'Disease Information';
                        }
                        ?>
                    </select>
                </div>
                <div class="dropdown mx-1">
                    <select class="form-select" name="pieYear">
                        <?= $options ?>
                    </select>
                </div>
                <div class="dropdown mx-1">
                    <select class="form-select" name="pieMun">
                        <option value="">all</option>
                        <?php echo $municipalityOption; ?>
                    </select>
                </div>
                <button type="submit" class='btn btn-primary mx-1'>Check</button>
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

if ($totalCount > 10 && $totalCount < 19) {
    $level = 'warning';
    $visibility = 'visible';
    $trigger = 'show';
} else if ($totalCount > 20) {
    $level = 'danger';
    $visibility = 'visible';
    $trigger = 'show';
} else {
    $level = '';
    $visibility = 'invisible';
    $trigger = null;
}
?>

<div class="alert alert-<?= $level ?> alert-dismissible fade show <?= $visibility ?>" role="alert">
    <strong>Oh no!</strong> <?= $diseaseTitle ?> has <?= $totalCount ?> cases on year <?= $pieSelectedYear ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label=" Close"></button>
</div>

<div class="row align-items-center card text-dark bg-light">
    <h5 class="card-header"><?= $diseaseTitle ?></h5>
    <div class="card-body text-center text-dark bg-light">
        <p class="card-text" style="text-align: justify;"><?= $diseaseInfo ?></p>
    </div>
</div>