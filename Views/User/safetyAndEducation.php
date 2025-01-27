<?php 
    require_once('../Shared/header.php');
    require_once('../Shared/navbar.php');
?>

<body>
    <!-- Title Section -->
<div style="background-color: #007bff; color: white; padding: 20px; text-align: center; font-size: 3rem; max-width: 100vw;margin-top: 40px;height:75px;">
            Safety and Education
        </div>
<!-- Page Content -->
<div style="padding: 20px; max-width: 1200px; margin: 0 auto;">

        <!-- Main Text -->
        <div style="margin-top: 20px;">
            <p style="font-size: 1.2rem; line-height: 1.6; text-align: start;">
            Sexual abuse and assault can be difficult topics to discuss. Learning about sexual abuse/assault, 
            being able to recognize potential warning signs, knowing how to respond, and being aware of resources can help.
            </p>
        </div>

        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <!-- Accordion Section -->
            <div style="flex: 3;">
                <button onclick="toggleAccordion(this)" style="width: 100%; background-color: #f4f4f4; color: #333; border: none; padding: 15px; text-align: left; font-size: 1.2rem; cursor: pointer; border-bottom: 1px solid #ccc; outline: none;">
                    HOW TO PREVENT
                </button>
                <div style="display: none; padding: 15px; background-color: #f9f9f9; border-top: 1px solid #ccc;">
<pre style="font-size:1rem;">At what age should you talk to your child about sexual abuse? It’s best to start talking as early as possible, 
using age-appropriate conversations. Here are the basics for parents and caretakers.

    <a href="howToPrevent.php">Educate Yourself</a>

        It's helpful to learn the facts about healthy sexual development as well as child sexual abuse.

    <a href="howToPrevent.php">Learn About Healthy Development</a>

        Know what the normal stages of development are for preschool, elementary, middle school children and young teens.

    <a href="howToPrevent.php">Talk to Your Child or Teen</a>

        Conversations about preventing sexual abuse can be complicated.

    <a href="howToPrevent.php">Family and Community Safety</a>
        
        Ensure safe environments for children and teens to grow, explore, learn and have fun.
</pre>
                </div>

                <button onclick="toggleAccordion(this)" style="width: 100%; background-color: #f4f4f4; color: #333; border: none; padding: 15px; text-align: left; font-size: 1.2rem; cursor: pointer; border-bottom: 1px solid #ccc; outline: none;">
                    HOW TO IDENTIFY
                </button>
                <div style="display: none; padding: 15px; background-color: #f9f9f9; border-top: 1px solid #ccc;">
<pre style="font-size:1rem;">It's important to identify the signs of sexual abuse and abusive behaviors, so that abuse 
can be stopped as soon as possible — or before anyone is harmed. Warning signs are often seen in concerning behaviors of 
children, teens and adults. Being able to recognize these behaviors can help you respond appropriately.

    <a href="howToidentify.php">Signs of Abuse</a>

        Knowing the warning signs of sexual assault can help you make a difference for someone you care about.

    <a href="howToIdentify.php">Abusive Behaviors</a>

        Someone you know or care about may be exhibiting problematic behaviors.
</pre>
                </div>

                <button onclick="toggleAccordion(this)" style="width: 100%; background-color: #f4f4f4; color: #333; border: none; padding: 15px; text-align: left; font-size: 1.2rem; cursor: pointer; border-bottom: 1px solid #ccc; outline: none;">
                    HOW TO RESPOND
                </button>
                <div style="display: none; padding: 15px; background-color: #f9f9f9; border-top: 1px solid #ccc;">
<pre style="font-size:1rem;">If a child or teen tells you they have been sexually abused or you suspect a child is being 
abused, call 9-1-1 or child protective services. If you are concerned there may be abuse happening to a child or in a family, 
call child protective services or seek professional help.

If you are concerned that an adult has been assaulted or an adult discloses sexual abuse, remember this: stay calm, listen 
compassionately, offer emotional support and offer to connect them with professional support. Reporting to the police is the 
victim’s choice. However, visiting the hospital for an exam (i.e., rape kit) as soon as possible preserves vital evidence if 
and when the victim decides to report to police.

    <a href="howToRespond.php">Supporting Victims</a>

        There are several things you can do to help in the healing process and provide the support your friend, family or 
        loved one may need.

    <a href="howToRespond.php">Addressing Abusive Behaviors</a>

        Doing nothing might be easier, but it may also mean that someone might be harmed.
</pre>
                </div>

                <button onclick="toggleAccordion(this)" style="width: 100%; background-color: #f4f4f4; color: #333; border: none; padding: 15px; text-align: left; font-size: 1.2rem; cursor: pointer; border-bottom: 1px solid #ccc; outline: none;">
                    QUESTIONS & ANSWERS
                </button>
                <div style="display: none; padding: 15px; background-color: #f9f9f9; border-top: 1px solid #ccc;">
<pre style="font-size:1rem;">Sexual abuse affects everyone: all ages, all races and ethnicities, in all areas of the 
country. Learning the facts about sexual abuse is one way to raise awareness and identify prevention 
strategies to increase safety.

    <a href="questionsAndAnswers.php">Sexual Abuse, Support for Victims, Prevention, Recidivism</a>
</pre>
                </div>

                <button onclick="toggleAccordion(this)" style="width: 100%; background-color: #f4f4f4; color: #333; border: none; padding: 15px; text-align: left; font-size: 1.2rem; cursor: pointer; border-bottom: 1px solid #ccc; outline: none;">
                    AFTER YOUR SEARCH
                </button>
                <div style="display: none; padding: 15px; background-color: #f9f9f9; border-top: 1px solid #ccc;">
<pre style="font-size:1rem;">Sex offender registries allow police and others in the criminal justice system track those 
individuals convicted of a sex offense. Public sex offender registries inform the public about registered sex offenders’ 
residences, school enrollment, employment and other information.

Once you know how sex offender registries work and what to do with registration information, you can learn more about 
how to keep you, your family and community safe.

    <a href="afterYourSearch.php">What do I do if I don't find someone on the registry?</a>

        Sex offender registries allow police and others in the criminal justice system track those individuals 
        convicted of a sex offense.

    <a href="afterYourSearch.php">What do I do if I don't find someone on the registry?</a>

        Registries are helpful tools, but they don’t list everyone who has sexually offended.
</pre>
                </div>
            </div>

            <!-- Sidebar -->
            <div style="flex: 1; margin-top: 20px;">
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="#" style="text-decoration: none; color: #1e3c58; font-size: 1rem;">How to Prevent</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="text-decoration: none; color: #1e3c58; font-size: 1rem;">How to Identify</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="text-decoration: none; color: #1e3c58; font-size: 1rem;">How to Respond</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="text-decoration: none; color: #1e3c58; font-size: 1rem;">Questions & Answers</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="text-decoration: none; color: #1e3c58; font-size: 1rem;">After Your Search</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const isOpen = content.style.display === 'block';
            document.querySelectorAll('.accordion-content').forEach(c => c.style.display = 'none');
            content.style.display = isOpen ? 'none' : 'block';
        }
    </script>
</body>
<?php require_once('../Shared/footer.php'); ?>
