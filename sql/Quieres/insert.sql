-- INSERT CHAT MSG
INSERT INTO `tbl_chat_msg`(`cmsg_id`, `language`, `classification`, `question`, `response`) 
    VALUES 
    ('CMSG-00000','English', 'General', 'Hello!', 'Hi! how can I help you?')
    , ('CMSG-00001', 'English', 'General', 'How do I create an account?', 'Your account is provided by the admin or your teacher once you are enrolled.')
    , ('CMSG-00002', 'English', 'General', 'What information is required to register for an account?', 'Your enrollment details are needed to register for an account but the admin or teacher will provide your account once you are enrolled.')
    , ('CMSG-00003', 'English', 'General', 'Can I use my social media account to register?', 'You cannot use your social media to register, your teacher or the admin is responsible for creating your account.')
    , ('CMSG-00004', 'English', 'General', 'Is my personal information secure when creating an account?', 'Your personal information will only be used in this system for your learning progress.')
    , ('CMSG-00005', 'English', 'General', 'Can I have multiple accounts with the same email address?', 'You cannot have multiple accounts, your teacher or admin will provide your account once you are enrolled.')
    , ('CMSG-00006', 'English', 'General', 'What should I do if I forget my username or password?', 'Ask your teacher regarding about your username and password.')
    , ('CMSG-00007', 'English', 'General', 'Can I change my username or email address after registering?', 'You cannot change your username once your account is given, however you can change your password with the help of your teacher or the admin.')
    , ('CMSG-00008', 'English', 'General', 'Is it possible to delete my account? Maaari bang burahin ang akin account?', 'It is not possible to delete your account since your account is given by your teacher and it is created carefully together with your details.')
    , ('CMSG-00009', 'English', 'General', 'Can I take the Function Literacy Test one more? ', 'Once you took the Function Literacy Test, you cannot retake it, however you can take it once you are instructed by your teacher. ')
    , ('CMSG-00010', 'English', 'General', 'Can I review the results of the test I took?', 'After taking the test, you can view the result and let your teacher explain it to you. ')

    , ('CMSG-00011','Filipino', 'General', 'Paano gumawa ng account?', 'Ang inyong account ay ibinibigay ng admin o ng inyong guro kapag kayo ay nakapag-enroll na.')
    , ('CMSG-00012','Filipino', 'General', 'Ano ang mga impormasyon na kailangan sa pag gawa ng account?', 'Kailangan ang mga detalye ng inyong pag-eenroll upang makapagrehistro ng account ngunit ang admin o guro ang magbibigay sa inyo ng inyong account kapag kayo ay nakapag-enroll na.')
    , ('CMSG-00013','Filipino', 'General', 'Maaari ko bang gamitin ang aking social media account sa pag rehistro?', 'Hindi maaaring gamitin ang inyong social media para sa pagpaparehistro, ang inyong guro o admin ang responsable sa paglikha ng inyong account.')
    , ('CMSG-00014','Filipino', 'General', 'Ligtas ba ang aking personal na impormasyon kapag gumagawa ng account?', 'Ang inyong personal na impormasyon ay gagamitin lamang sa sistemang ito para sa inyong pag-unlad sa pag-aaral.')
    , ('CMSG-00015','Filipino', 'General', 'Ano ang gagawin ko kapag nakalimutan ko ang aking username at password?', 'Itanong sa inyong guro ang inyong username at password.')
    , ('CMSG-00016','Filipino', 'General', 'Maaari ko bang palitan ang aking username o email address pagkatapos mag rehistro?', 'Hindi maaaring baguhin ang inyong username kapag ibinigay na ang inyong account, ngunit maaaring baguhin ang inyong password sa tulong ng inyong guro o ng admin.')
    , ('CMSG-00017','Filipino', 'General', 'Maaari bang burahin ang akin account?', 'Hindi maaaring burahin ang inyong account dahil ang inyong account ay ibinigay ng inyong guro at maingat na nilikha kasama ang inyong mga detalye.')
    , ('CMSG-00018','Filipino', 'General', 'Maaari ko bang ulitin ang Function Literacy Test?', 'Kapag kayo ay sumagot na ng Function Literacy Test, hindi na kayo maaaring magsagot muli nito, ngunit maaari kayong sumagot nito kapag kayo ay sinabihan ng inyong guro.')
    , ('CMSG-00019','Filipino', 'General', 'Maaari ko bang rebyuhin ang result ng test na aking kinuha?', 'Matapos gawin ang pagsusulit, maaari niyong tingnan ang resulta at ipapaliwanag ito ng inyong guro.')
;

-- INSERT LEARNING LEVEL
INSERT INTO `tbl_learning_lvl`(`lrvl_id`, `lrvl_num`, `name`, `description`) 
    VALUES 
    ('LRVL-00001','1','Basic Literacy','')
    , ('LRVL-00002','2','Lower Elementary Level','')
    , ('LRVL-00003','3','Advanced Elementary Level','')
;

-- INSERT SUBJECT
INSERT INTO `tbl_subject` (`subj_id`, `learning_lvl`, `subj_num`, `name`, `description`, `status`) 
    VALUES 
    ('SUBJ-00101', 'LRVL-00001', '1.1', 'LS1', 'Communication Skills', 'active')
    , ('SUBJ-00102', 'LRVL-00001', '2.1', 'LS2', 'Problem Solving Skills and Critical Thinking', 'active')
    , ('SUBJ-00105', 'LRVL-00001', '3.1', 'LS5', 'Understanding the Self and the Society', 'active')
    
    , ('SUBJ-00202', 'LRVL-00002', '1.1', 'LS2', 'Scientific and Critical Thinking Skills', 'active')
    , ('SUBJ-00203', 'LRVL-00002', '2.1', 'LS3', 'Mathematical and Problem-solving Skills', 'active')
    , ('SUBJ-00205', 'LRVL-00002', '3.1', 'LS5', 'Understanding the Self and the Society', 'active')
    
    , ('SUBJ-00301', 'LRVL-00003', '1.1', 'LS1', 'Communication Skills (English)', 'active')
    , ('SUBJ-00311', 'LRVL-00003', '1.2', 'LS1', 'Communication Skills (Filipino)', 'active')
    , ('SUBJ-00302', 'LRVL-00003', '2.1', 'LS2', 'Scientific Literacy and Critical Thinking', 'active')
    , ('SUBJ-00303', 'LRVL-00003', '3.1', 'LS3', 'Mathematics and Problem Solving Skills', 'active')
    , ('SUBJ-00304', 'LRVL-00003', '4.1', 'LS4', 'Life and Career', 'active')
    , ('SUBJ-00305', 'LRVL-00003', '5.1', 'LS5', 'Understanding the Self and the Society', 'active')
    , ('SUBJ-00306', 'LRVL-00003', '6.1', 'LS6', 'Digital Citizenship', 'active')
;

-- INSERT MODULE
INSERT INTO `tbl_module` (`modl_id`, `ls_subject`, `module_no`, `title`, `sub_title`, `sub_folder`, `file_name`, `status`) 
	VALUES 
    -- 1. Basic Elem Modules
    ('MODL-10101', 'SUBJ-00101', '1', 'Aralin 1', '', 'All Modules', 'Aralin-1.pdf', 'active')
    , ('MODL-10102', 'SUBJ-00101', '2', 'Aralin 2', '', 'All Modules', 'Aralin-2.pdf', 'active')
    , ('MODL-10103', 'SUBJ-00101', '3', 'Aralin 3', '', 'All Modules', 'Aralin-3.pdf', 'active')
    , ('MODL-10104', 'SUBJ-00101', '4', 'Aralin 4', '', 'All Modules', 'Aralin-4.pdf', 'active')
    , ('MODL-10105', 'SUBJ-00101', '5', 'Aralin 5', '', 'All Modules', 'Aralin-5.pdf', 'active')
    , ('MODL-10106', 'SUBJ-00101', '6', 'Aralin 5', '', 'All Modules', 'Aralin-6.pdf', 'active')
    , ('MODL-10107', 'SUBJ-00101', '7', 'Aralin 5', '', 'All Modules', 'Aralin-7.pdf', 'active')
    , ('MODL-10108', 'SUBJ-00101', '8', 'Aralin 5', '', 'All Modules', 'Aralin-8.pdf', 'active')

    , ('MODL-10201', 'SUBJ-00102', '1', 'Aralin 1', 'Pagsasaka', 'Pagsasaka', 'Aralin 1.pdf', 'active')
    , ('MODL-10202', 'SUBJ-00102', '2', 'Aralin 2', 'Pagsasaka', 'Pagsasaka', 'Aralin 2.pdf', 'active')
    , ('MODL-10203', 'SUBJ-00102', '3', 'Cover Page', 'Pagsasaka', 'Pagsasaka', 'Cover Page.pdf', 'active')
    , ('MODL-10204', 'SUBJ-00102', '4', 'Manwal', 'Pagsasaka', 'Pagsasaka', 'Manwal.pdf', 'active')
    , ('MODL-10205', 'SUBJ-00102', '5', 'Panimula', 'Pagsasaka', 'Pagsasaka', 'Panimula.pdf', 'active')
    , ('MODL-10206', 'SUBJ-00102', '6', 'Prelims', 'Pagsasaka', 'Pagsasaka', 'Prelims.pdf', 'active')
    , ('MODL-10207', 'SUBJ-00102', '7', 'Title Page', 'Pagsasaka', 'Pagsasaka', 'Title Page.pdf', 'active')

    , ('MODL-10208', 'SUBJ-00102', '1', 'Aralin 1', 'Sakit', 'Sakit', 'Aralin 1.pdf', 'active')
    , ('MODL-10209', 'SUBJ-00102', '2', 'Aralin 2', 'Sakit', 'Sakit', 'Aralin 2.pdf', 'active')
    , ('MODL-10210', 'SUBJ-00102', '3', 'Aralin 3', 'Sakit', 'Sakit', 'Aralin 3.pdf', 'active')
    , ('MODL-10211', 'SUBJ-00102', '4', 'Cover Page', 'Sakit', 'Sakit', 'Cover Page.pdf', 'active')
    , ('MODL-10212', 'SUBJ-00102', '5', 'Manwal', 'Sakit', 'Sakit', 'Manwal.pdf', 'active')
    , ('MODL-10213', 'SUBJ-00102', '6', 'Panimula', 'Sakit', 'Sakit', 'Panimula.pdf', 'active')
    , ('MODL-10214', 'SUBJ-00102', '7', 'Prelims', 'Sakit', 'Sakit', 'Prelims.pdf', 'active')
    , ('MODL-10215', 'SUBJ-00102', '8', 'Title Page', 'Sakit', 'Sakit', 'Title Page.pdf', 'active')

    , ('MODL-10501', 'SUBJ-00105', '1', 'Aralin 1', 'Ako at ang aking Watawat', 'Ako at ang aking Watawat', 'Aralin 1.pdf', 'active')
    , ('MODL-10502', 'SUBJ-00105', '2', 'Aralin 2', 'Ako at ang aking Watawat', 'Ako at ang aking Watawat', 'Aralin 2.pdf', 'active')

    , ('MODL-10503', 'SUBJ-00105', '1', 'Aralin 1', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Aralin 1.pdf', 'active')
    , ('MODL-10504', 'SUBJ-00105', '2', 'Aralin 2', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Aralin 2.pdf', 'active')
    , ('MODL-10505', 'SUBJ-00105', '2', 'Aralin 3', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Aralin 3.pdf', 'active')

    -- 2. Lower Elem Modules
    , ('MODL-20101', 'SUBJ-00202', '1', 'How Do We Breath', '','', 'How Do We Breath.pdf', 'active')
    , ('MODL-20102', 'SUBJ-00202', '2', 'My Health My Responsibility', '','', 'My Health My Responsibility.pdf', 'active')

    , ('MODL-20103', 'SUBJ-00203', '1', 'Geometrical-Shapes', '', 'All Modules', 'Geometrical-Shapes.pdf', 'active')
    , ('MODL-20104', 'SUBJ-00203', '2', 'Its-About-Time', '', 'All Modules', 'Its-About-Time.pdf', 'active')
    , ('MODL-20105', 'SUBJ-00203', '3', 'Time', '', 'All Modules', 'Time.pdf', 'active')

    , ('MODL-20106', 'SUBJ-00205', '1', 'Ang-Kahalagahan-ng-Pamilya', '','', 'Ang-Kahalagahan-ng-Pamilya.pdf', 'active')
    , ('MODL-20107', 'SUBJ-00205', '2', 'Ito-ang-Ating-Kultura', '','', 'Ito-ang-Ating-Kultura.pdf', 'active')
    , ('MODL-20108', 'SUBJ-00205', '3', 'Kaya-Natin-Makamit-Ang-Lahat-KUng-Tayo-ay-May-Disiplina', '','', 'Kaya-Natin-Makamit-Ang-Lahat-KUng-Tayo-ay-May-Disiplina.pdf', 'active')
    , ('MODL-20109', 'SUBJ-00205', '4', 'Naiiba-Ako', '','', 'Naiiba-Ako.pdf', 'active')
    , ('MODL-20110', 'SUBJ-00205', '5', 'Sino-Ako', '','', 'Sino-Ako.pdf', 'active')

    -- 3. Advanced Elementary Level
    , ('MODL-30101', 'SUBJ-00301', '1', 'Appropriate Expressions in Meetings and Interviews', '', 'All Modules', 'Appropriate Expressions in Meetings and Interviews.pdf', 'active')
    , ('MODL-30102', 'SUBJ-00301', '2', 'Daily News', '', 'All Modules', 'Daily News.pdf', 'active')
    , ('MODL-30103', 'SUBJ-00301', '3', 'Hello May I Help You', '', 'All Modules', 'Hello May I Help You.pdf', 'active')
    , ('MODL-30104', 'SUBJ-00301', '4', 'I Have A Letter For You', '', 'All Modules', 'I Have A Letter For You.pdf', 'active')
    , ('MODL-30105', 'SUBJ-00301', '5', 'The ABCs of Writing Complex Sentences', '', 'All Modules', 'The ABCs of Writing Complex Sentences.pdf', 'active')

    , ('MODL-30201', 'SUBJ-00302', '1', 'Animals Love Them and Care for Them', 'English', 'English', 'Animals Love Them and Care for Them.pdf', 'active')
    , ('MODL-30202', 'SUBJ-00302', '2', 'Herbal Medicine', 'English', 'English', 'Herbal Medicine.pdf', 'active')
    , ('MODL-30203', 'SUBJ-00302', '3', 'Living With Simple Machines', 'English', 'English', 'Living With Simple Machines.pdf', 'active')
    , ('MODL-30204', 'SUBJ-00302', '4', 'Preparing for Calamities', 'English', 'English', 'Preparing for Calamities.pdf', 'active')
    , ('MODL-30205', 'SUBJ-00302', '5', 'Preparing for Typhoons', 'English', 'English', 'Preparing for Typhoons.pdf', 'active')
    , ('MODL-30206', 'SUBJ-00302', '6', 'Saving Our Soil Resources', 'English', 'English', 'Saving Our Soil Resources.pdf', 'active')
    , ('MODL-30207', 'SUBJ-00302', '7', 'Think Green', 'English', 'English', 'Think Green.pdf', 'active')
    , ('MODL-30209', 'SUBJ-00302', '8', 'What is Happening to Our Environment', 'English', 'English', 'What is Happening to Our Environment.pdf', 'active')

    , ('MODL-30210', 'SUBJ-00302', '9', 'Ano ang Nangyayari sa Ating Kapaligiran', 'Tagalog', 'Tagalog', 'Ano ang Nangyayari sa Ating Kapaligiran.pdf', 'active')
    , ('MODL-30211', 'SUBJ-00302', '10', 'Mahalin at Aru00304gain ang mga Hayop', 'Tagalog', 'Tagalog', 'Mahalin at Arugain ang mga Hayop.pdf', 'active')
    , ('MODL-30212', 'SUBJ-00302', '11', 'Mga Halamang Gamot', 'Tagalog', 'Tagalog', 'Mga Halamang Gamot.pdf', 'active')
    , ('MODL-30213', 'SUBJ-00302', '12', 'Mga Luntiang Halaman', 'Tagalog', 'Tagalog', 'Mga Luntiang Halaman.pdf', 'active')
    , ('MODL-30214', 'SUBJ-00302', '13', 'Mga Simpleng Makina', 'Tagalog', 'Tagalog', 'Mga Simpleng Makina.pdf', 'active')
    , ('MODL-30215', 'SUBJ-00302', '14', 'Paghahanda Para sa Bagyo', 'Tagalog', 'Tagalog', 'Paghahanda Para sa Bagyo.pdf', 'active')
    , ('MODL-30216', 'SUBJ-00302', '15', 'Paghahanda sa Kalamidad', 'Tagalog', 'Tagalog', 'Paghahanda sa Kalamidad.pdf', 'active')
    , ('MODL-30218', 'SUBJ-00302', '16', 'Pagliligtas sa Ating mga Yamang Lupa', 'Tagalog', 'Tagalog', 'Pagliligtas sa Ating mga Yamang Lupa.pdf', 'active')

    , ('MODL-30301', 'SUBJ-00303', '1', 'Addition and Subtraction in Daily Life', 'English', 'English', 'Addition and Subtraction in Daily Life.pdf', 'active')
    , ('MODL-30302', 'SUBJ-00303', '2', 'Addition and Subtraction in Decimals', 'English', 'English', 'Addition and Subtraction in Decimals.pdf', 'active')
    , ('MODL-30303', 'SUBJ-00303', '3', 'Addition and Subtraction of Fractions', 'English', 'English', 'Addition and Subtraction of Fractions.pdf', 'active')
    , ('MODL-30304', 'SUBJ-00303', '4', 'Geometrical Shapes', 'English', 'English', 'Geometrical Shapes.pdf', 'active')
    , ('MODL-30305', 'SUBJ-00303', '5', 'Its About Time', 'English', 'English', 'Its About Time.pdf', 'active')
    , ('MODL-30306', 'SUBJ-00303', '6', 'Learning About Fractions', 'English', 'English', 'Learning About Fractions.pdf', 'active')
    , ('MODL-30307', 'SUBJ-00303', '7', 'Measuring Length', 'English', 'English', 'Measuring Length.pdf', 'active')
    , ('MODL-30308', 'SUBJ-00303', '8', 'Measuring Volume', 'English', 'English', 'Measuring Volume.pdf', 'active')
    , ('MODL-30309', 'SUBJ-00303', '9', 'Multiplication and Division in Daily Life', 'English', 'English', 'Multiplication and Division in Daily Life.pdf', 'active')
    , ('MODL-30310', 'SUBJ-00303', '10', 'Multiplication and Division of Decimals', 'English', 'English', 'Multiplication and Division of Decimals.pdf', 'active')
    , ('MODL-30311', 'SUBJ-00303', '11', 'Ratio and Proportion', 'English', 'English', 'Ratio and Proportion.pdf', 'active')
    , ('MODL-30312', 'SUBJ-00303', '12', 'Solving Day to Day Problems', 'English', 'English', 'Solving Day to Day Problems.pdf', 'active')

    , ('MODL-30313', 'SUBJ-00303', '13', 'Itoy Tungkol sa Oras', 'Tagalog', 'Tagalog', 'Itoy Tungkol sa Oras.pdf', 'active')
    , ('MODL-30314', 'SUBJ-00303', '14', 'Mga Heometrikong Hugis', 'Tagalog', 'Tagalog', 'Mga Heometrikong Hugis.pdf', 'active')
    , ('MODL-30315', 'SUBJ-00303', '15', 'Pagdaragdag at Pagbabawas ng mga Decimals', 'Tagalog', 'Tagalog', 'Pagdaragdag at Pagbabawas ng mga Decimals.pdf', 'active')
    , ('MODL-30316', 'SUBJ-00303', '16', 'Pagdaragdag at Pagbabawas ng Praksyon', 'Tagalog', 'Tagalog', 'Pagdaragdag at Pagbabawas ng Praksyon.pdf', 'active')
    , ('MODL-30317', 'SUBJ-00303', '17', 'Pagdaragdag at Pagbabawas sa Pang araw araw na Buhay', 'Tagalog', 'Tagalog', 'Pagdaragdag at Pagbabawas sa Pang araw araw na Buhay.pdf', 'active')
    , ('MODL-30318', 'SUBJ-00303', '18', 'Pagkilala sa mga Praksyon', 'Tagalog', 'Tagalog', 'Pagkilala sa mga Praksyon.pdf', 'active')
    , ('MODL-30319', 'SUBJ-00303', '19', 'Paglutas ng Pang araw araw na Suliranin', 'Tagalog', 'Tagalog', 'Paglutas ng Pang araw araw na Suliranin.pdf', 'active')
    , ('MODL-30320', 'SUBJ-00303', '20', 'Pagpaparami at Paghahati sa Pang araw araw ng buhay', 'Tagalog', 'Tagalog', 'Pagpaparami at Paghahati sa Pang araw araw ng buhay.pdf', 'active')
    , ('MODL-30321', 'SUBJ-00303', '21', 'Pagsukat ng Haba', 'Tagalog', 'Tagalog', 'Pagsukat ng Haba.pdf', 'active')
    , ('MODL-30322', 'SUBJ-00303', '22', 'Panumbasan at Proporsiyon', 'Tagalog', 'Tagalog', 'Panumbasan at Proporsiyon.pdf', 'active')

    , ('MODL-30401', 'SUBJ-00304', '1', 'Maaari Kang Magtagumpay sa Negosyo', '', 'All Modules', 'Maaari Kang Magtagumpay sa Negosyo.pdf', 'active')
    , ('MODL-30402', 'SUBJ-00304', '2', 'Mga Ideya Tungkol sa mga Proyektong Mapagkikitaan', '', 'All Modules', 'Mga Ideya Tungkol sa mga Proyektong Mapagkikitaan.pdf', 'active')
    , ('MODL-30403', 'SUBJ-00304', '3', 'Mga Katangian ng Matagumpay na Negosyante', '', 'All Modules', 'Mga Katangian ng Matagumpay na Negosyante.pdf', 'active')
    , ('MODL-30404', 'SUBJ-00304', '4', 'Paano Magkaroon ng Sarili Mong Gulayan', '', 'All Modules', 'Paano Magkaroon ng Sarili Mong Gulayan.pdf', 'active')
    , ('MODL-30405', 'SUBJ-00304', '5', 'Paghahanda para sa edukasyon Teknikal at Bokasyonal', '', 'All Modules', 'Paghahanda para sa edukasyon Teknikal at Bokasyonal.pdf', 'active')
    , ('MODL-30406', 'SUBJ-00304', '6', 'Pagpaplano ng Iyong Negosyo (Ikalawang Bahagi)', '', 'All Modules', 'Pagpaplano ng Iyong Negosyo (Ikalawang Bahagi).pdf', 'active')
    , ('MODL-30407', 'SUBJ-00304', '7', 'Pagpaplano ng Iyong Negosyo (Unang Bahagi)', '', 'All Modules', 'Pagpaplano ng Iyong Negosyo (Unang Bahagi).pdf', 'active')
    , ('MODL-30408', 'SUBJ-00304', '8', 'Produkto at Serbisyo', '', 'All Modules', 'Produkto at Serbisyo.pdf', 'active')

    , ('MODL-30501', 'SUBJ-00305', '1', 'Ako Ang Pamilya at ang Aking Komunidad', '', 'All Modules', 'Ako Ang Pamilya at ang Aking Komunidad.pdf', 'active')
    , ('MODL-30502', 'SUBJ-00305', '2', 'Ang Mundo Ayon sa Mapa', '', 'All Modules', 'Ang Mundo Ayon sa Mapa.pdf', 'active')
    , ('MODL-30503', 'SUBJ-00305', '3', 'Kailangan Kita', '', 'All Modules', 'Kailangan Kita.pdf', 'active')
    , ('MODL-30504', 'SUBJ-00305', '4', 'Mga Masasarap na Pagkain sa Asya', '', 'All Modules', 'Mga Masasarap na Pagkain sa Asya.pdf', 'active')
    , ('MODL-30505', 'SUBJ-00305', '5', 'Mga Pinaniniwalaang Pamahiin', '', 'All Modules', 'Mga Pinaniniwalaang Pamahiin.pdf', 'active')
    , ('MODL-30506', 'SUBJ-00305', '6', 'Pag unawa sa Stress', '', 'All Modules', 'Pag unawa sa Stress.pdf', 'active')
    , ('MODL-30507', 'SUBJ-00305', '7', 'Paggunita sa Ating mga Pambansang Bayani', '', 'All Modules', 'Paggunita sa Ating mga Pambansang Bayani.pdf', 'active')
    , ('MODL-30508', 'SUBJ-00305', '8', 'Pagpaplano Para sa Personal na Pagbabago', '', 'All Modules', 'Pagpaplano Para sa Personal na Pagbabago.pdf', 'active')
    , ('MODL-30509', 'SUBJ-00305', '9', 'Pilipino Isang Puso Isang Lahi', '', 'All Modules', 'Pilipino Isang Puso Isang Lahi.pdf', 'active')
    , ('MODL-30510', 'SUBJ-00305', '10', 'Tuloy Ka sa Aking Tahanan', '', 'All Modules', 'Tuloy Ka sa Aking Tahanan.pdf', 'active')

    , ('MODL-30601', 'SUBJ-00306', '1', 'MODULE 1: LET`S FIX COMPUTERS', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M01 (V1.2).pdf', 'active')
    , ('MODL-30602', 'SUBJ-00306', '2', 'MODULE 2: DIGITAL APPLICATIONS - WORD PROCESSING', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M02 (V1.2.C).pdf', 'active')
    , ('MODL-30603', 'SUBJ-00306', '3', 'MODULE 3: DIGITAL APPLICATIONS - SPREADSHEETS', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M03 (V1.1.C).pdf', 'active')
    , ('MODL-30604', 'SUBJ-00306', '4', 'MODULE 4: DIGITAL APPLICATIONS - PRESENTATION SOFTWARE', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M04 (V1.1.C).pdf', 'active')
    , ('MODL-30605', 'SUBJ-00306', '5', 'MODULE 5: DIGITAL SYSTEM NETWORK', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M05 (V1.1).pdf', 'active')
    , ('MODL-30606', 'SUBJ-00306', '6', 'MODULE 6: DIGITAL DEVICES', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M06 (V1.1).pdf', 'active')
    , ('MODL-30607', 'SUBJ-00306', '7', 'MODULE 7: DIGITAL ETHICS (NETIQUETTE)', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M07 (V1.1).pdf', 'active')

    , ('MODL-31101', 'SUBJ-00311', '1', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap', '', 'All Modules', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap.pdf', 'active')
    , ('MODL-31102', 'SUBJ-00311', '2', 'Angkop na Pahayag sa mga Pulong at Panayam', '', 'All Modules', 'Angkop na Pahayag sa mga Pulong at Panayam.pdf', 'active')
    , ('MODL-31103', 'SUBJ-00311', '3', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap', '', 'All Modules', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap.pdf', 'active')
    , ('MODL-31104', 'SUBJ-00311', '4', 'Mayroon akong Liham Para Sa Iyo', '', 'All Modules', 'Mayroon akong Liham Para Sa Iyo.pdf', 'active')
    , ('MODL-31105', 'SUBJ-00311', '5', 'Pang-araw-araw na Balita', '', 'All Modules', 'Pang-araw-araw na Balita.pdf', 'active')
;

-- INSERT SCHOOL YEAR
INSERT INTO `tbl_school_year`(`shyr_id`, `school_year`, `status`) 
    VALUES ('SHYR-00001','2022-2023', 'active')
    , ('SHYR-00002','2021-2022', 'completed')
    , ('SHYR-00003','2020-2021', 'completed')
    , ('SHYR-00004','2019-2020', 'completed')
    , ('SHYR-00005','2018-2019', 'completed')
;

-- TEST PERIOD
INSERT INTO `tbl_test_period`(`tprd_id`, `test_period`, `status`) 
    VALUES ('TPRD-00001','Pre-test','open')
    , ('TPRD-00002','Post-test','closed')

-- TEST SUBJECT
INSERT INTO `tbl_test_subject`(`tsbj_id`, `name`, `description`) 
    VALUES ('TSBJ-00001','PIS','Personal Information Sheet')
    , ('TSBJ-00002','LS 1','Communication Skills (English)')
    , ('TSBJ-00003','LS 1','Communication Skills (Filipino)')
    , ('TSBJ-00004','LS 2','Scientific Literacy and Critical Thinking')
    , ('TSBJ-00005','LS 3','Mathematics and Problem Solving Skills')
    , ('TSBJ-00006','LS 4','Life & Career')
    , ('TSBJ-00007','LS 5','Understanding the Self & Society')
    , ('TSBJ-00008','LS 6','Digital Citizenship')
;

-- TEST QUESTIONS
INSERT INTO `tbl_test_question`(`tqst_id`, `subject`, `question_num`, `correct_ans`, `max_points`) 
    VALUES 
    -- PIS
    ('TQST-00101','TSBJ-00001','1','',1)
    , ('TQST-00102','TSBJ-00001','2','',1)
    , ('TQST-00103','TSBJ-00001','3','',1)
    , ('TQST-00104','TSBJ-00001','4','',1)
    , ('TQST-00105','TSBJ-00001','5','',1)
    , ('TQST-00106','TSBJ-00001','6','',1)
    , ('TQST-00107','TSBJ-00001','7','',1)
    , ('TQST-00108','TSBJ-00001','8','',1)
    , ('TQST-00109','TSBJ-00001','9','',2)

    -- LS1 (English)
    , ('TQST-00201','TSBJ-00002','1','A',1)
    , ('TQST-00202','TSBJ-00002','2','B',1)
    , ('TQST-00203','TSBJ-00002','3','D',1)
    , ('TQST-00204','TSBJ-00002','4','A',1)
    , ('TQST-00205','TSBJ-00002','5','D',1)
    , ('TQST-00206','TSBJ-00002','6','',1)
    , ('TQST-00207','TSBJ-00002','7','',1)
    , ('TQST-00208','TSBJ-00002','8','',1)
    
    -- LS1 (Filipino)
    , ('TQST-00301','TSBJ-00003','1','C',1)
    , ('TQST-00302','TSBJ-00003','2','C',1)
    , ('TQST-00303','TSBJ-00003','3','D',1)
    , ('TQST-00304','TSBJ-00003','4','KOMPUTER',1)
    , ('TQST-00305','TSBJ-00003','5','',2)
    
    -- LS2 
    , ('TQST-00401','TSBJ-00004','1','B',1)
    , ('TQST-00402','TSBJ-00004','2','C',1)
    , ('TQST-00403','TSBJ-00004','3','C',1)
    , ('TQST-00404','TSBJ-00004','4','B',1)
    , ('TQST-00405','TSBJ-00004','5','D',1)
    
    -- LS3 
    , ('TQST-00501','TSBJ-00005','1','D',1)
    , ('TQST-00502','TSBJ-00005','2','A',1)
    , ('TQST-00503','TSBJ-00005','3','B',1)
    , ('TQST-00504','TSBJ-00005','4','B',1)
    , ('TQST-00505','TSBJ-00005','5','A',1)
    , ('TQST-00506','TSBJ-00005','6','A',1)
    , ('TQST-00507','TSBJ-00005','7','D',1)
    , ('TQST-00508','TSBJ-00005','8','C',1)
    
    -- LS4 
    , ('TQST-00601','TSBJ-00006','1','C',1)
    , ('TQST-00602','TSBJ-00006','2','A',1)
    , ('TQST-00603','TSBJ-00006','3','B',1)
    , ('TQST-00604','TSBJ-00006','4','D',1)
    , ('TQST-00605','TSBJ-00006','5','C',1)
    , ('TQST-00606','TSBJ-00006','6','A',1)
    
    -- LS5 
    , ('TQST-00701','TSBJ-00007','1','D',1)
    , ('TQST-00702','TSBJ-00007','2','A',1)
    , ('TQST-00703','TSBJ-00007','3','A',1)
    , ('TQST-00704','TSBJ-00007','4','C',1)
    , ('TQST-00705','TSBJ-00007','5','B',1)
    
    -- LS6 
    , ('TQST-00801','TSBJ-00008','1','D',1)
    , ('TQST-00802','TSBJ-00008','2','C',1)
    , ('TQST-00803','TSBJ-00008','3','D',1)
    , ('TQST-00804','TSBJ-00008','4','C',1)
    , ('TQST-00805','TSBJ-00008','5','A',1)
    , ('TQST-00806','TSBJ-00008','6','D',1)
;

-- INSERT TEST ANSWER
INSERT INTO `tbl_test_answer`(`tans_id`, `school_year`, `test_part`, `student`, `question`, `student_ans`, `score_points`) 
    VALUES 
    -- PIS
    ('TANS-00101','SHYR-00001','TPRT-00001','102230060002','TQST-00101','',1)
    , ('TANS-00102','SHYR-00001','TPRT-00001','102230060002','TQST-00102','',1)
    , ('TANS-00103','SHYR-00001','TPRT-00001','102230060002','TQST-00103','',1)
    , ('TANS-00104','SHYR-00001','TPRT-00001','102230060002','TQST-00104','',1)
    , ('TANS-00105','SHYR-00001','TPRT-00001','102230060002','TQST-00105','',1)
    , ('TANS-00106','SHYR-00001','TPRT-00001','102230060002','TQST-00106','',1)
    , ('TANS-00107','SHYR-00001','TPRT-00001','102230060002','TQST-00107','',1)
    , ('TANS-00108','SHYR-00001','TPRT-00001','102230060002','TQST-00108','',1)
    , ('TANS-00109','SHYR-00001','TPRT-00001','102230060002','TQST-00109','',2)
    
    -- LS1 (English)
    , ('TANS-00201','SHYR-00001','TPRT-00001','102230060002','TQST-00201','A',1)
    , ('TANS-00202','SHYR-00001','TPRT-00001','102230060002','TQST-00202','B',1)
    , ('TANS-00203','SHYR-00001','TPRT-00001','102230060002','TQST-00203','D',1)
    , ('TANS-00204','SHYR-00001','TPRT-00001','102230060002','TQST-00204','A',1)
    , ('TANS-00205','SHYR-00001','TPRT-00001','102230060002','TQST-00205','D',1)
    , ('TANS-00206','SHYR-00001','TPRT-00001','102230060002','TQST-00206','',1)
    , ('TANS-00207','SHYR-00001','TPRT-00001','102230060002','TQST-00207','',1)
    , ('TANS-00208','SHYR-00001','TPRT-00001','102230060002','TQST-00208','',1)
    
    -- LS1 (Filipino)
    , ('TANS-00301','SHYR-00001','TPRT-00001','102230060002','TQST-00301','C',1)
    , ('TANS-00302','SHYR-00001','TPRT-00001','102230060002','TQST-00302','C',1)
    , ('TANS-00303','SHYR-00001','TPRT-00001','102230060002','TQST-00303','D',1)
    , ('TANS-00304','SHYR-00001','TPRT-00001','102230060002','TQST-00304','KOMPUTER',1)
    , ('TANS-00305','SHYR-00001','TPRT-00001','102230060002','TQST-00305','',1)
    
    -- LS2 
    , ('TANS-00401','SHYR-00001','TPRT-00001','102230060002','TQST-00401','B',1)
    , ('TANS-00402','SHYR-00001','TPRT-00001','102230060002','TQST-00402','C',1)
    , ('TANS-00403','SHYR-00001','TPRT-00001','102230060002','TQST-00403','C',1)
    , ('TANS-00404','SHYR-00001','TPRT-00001','102230060002','TQST-00404','B',1)
    , ('TANS-00405','SHYR-00001','TPRT-00001','102230060002','TQST-00405','D',1)
;


-- INSERT FLT PIS
INSERT INTO `tbl_flt_pis`(`fpis_id`
    , `student`
    , `f_name`
    , `m_name`
    , `l_name`, `name_score`
    , `gender`, `gender_score`
    , `birhtdate`, `birhtdate_score`
    , `adrs_num_st`
    , `adrs_brgy`
    , `adrs_city`
    , `adrs_province`, `adrs_score`
    , `religion`, `religion_score`
    , `civil_status`, `civil_status_score`
    , `occupation`, `occupation_score`
    , `high_educ`, `high_educ_score`
    , `about_student`, `about_student_score`

    , `total_score`
    , `status`) 

    VALUES (
    'FPIS-00001'
    , '102230060002'
    , 'María Clara'
    , 'de los Santos'
    , 'Alba', 1
    , 'Female', 1
    , '2001-05-20', 1
    , '01 Sample St.'
    , 'Barangay 1'
    , 'Manila'
    , 'Metro Manila', 1
    , 'Roman Catholic', 1
    , 'Walang asawa', 1
    , 'N/A', 1
    , 'Grade 5', 1
    , 'Testing student description', 2

    , 10
    , 'active'
);

-- INSERT FLT LS1 ENG
INSERT INTO `tbl_flt_ls1_eng`(`fls1e_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    , `q6_answer`, `q6_score`
    , `q7_answer`, `q7_score`
    , `q8_answer`, `q8_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS1E-00002' , 'A', 1 , 'B', 1 , 'D', 1 , 'A', 1 , 'D', 1 , 'Sample Answer for Q6.', 1 , 'Sample Answer for Q7.', 1 , 'Sample Answer for Q8.', 1
        , '2023-07-14', 'EMPL-0001' , 8 , 'checked')
    , ('FLS1E-00003' , 'A', 1 , 'D', 0 , 'D', 1 , 'B', 0 , 'D', 1 , 'Sample Answer for Q6.', 1 , 'Sample Answer for Q7.', 1 , 'Sample Answer for Q8.', 1
        , '2023-07-14', 'EMPL-0001' , 8 , 'checked')
    , ('FLS1E-00004' , 'A', 1 , 'D', 0 , 'D', 1 , 'B', 0 , 'D', 1 , 'Sample Answer for Q6.', 1 , 'Sample Answer for Q7.', 1 , 'Sample Answer for Q8.', 1
        , '2023-07-14', 'EMPL-0001' , 8 , 'checked')
    , ('FLS1E-00005' , 'A', 1 , 'D', 0 , 'D', 1 , 'B', 0 , 'D', 1 , 'Sample Answer for Q6.', 1 , 'Sample Answer for Q7.', 1 , 'Sample Answer for Q8.', 1
        , '2023-07-14', 'EMPL-0001' , 8 , 'checked')
;


-- INSERT FLT LS1 FIL
INSERT INTO `tbl_flt_ls1_fil`(`fls1f_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS1F-00001' , 'B', 0 , 'C', 1 , 'D', 0 , 'KOMPYUTER', 1 , 'Sample Answer for Q8.', 2
        , '2023-07-14', 'EMPL-0001'  , 4 , 'checked')
    , ('FLS1F-00002' , 'C', 1 , 'C', 1 , 'D', 1 , 'KOMPYUTER', 1 , 'Sample Answer for Q8.', 2
        , '2023-07-14', 'EMPL-0001'  , 6 , 'checked')
    , ('FLS1F-00003' , 'B', 0 , 'C', 1 , 'A', 1 , 'KOMPYUTER', 1 , 'Sample Answer for Q8.', 2
        , '2023-07-14', 'EMPL-0001'  , 5 , 'checked')
    , ('FLS1F-00004' , 'B', 0 , 'D', 0 , 'A', 1 , 'KOMPYUTER', 1 , 'Sample Answer for Q8.', 2
        , '2023-07-14', 'EMPL-0001'  , 4 , 'checked')
    , ('FLS1F-00005' , 'B', 0 , 'C', 1 , 'D', 0 , 'KOMPYUTER', 1 , 'Sample Answer for Q8.', 2
        , '2023-07-14', 'EMPL-0001'  , 4 , 'checked')
;

-- INSERT FLT LS2
INSERT INTO `tbl_flt_ls2`(`fls2_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS2-00002' , 'D', 1 , 'C', 1 , 'C', 1 , 'B', 1 , 'D', 1
        , '2023-07-14', 'EMPL-0001', 5, 'checked')
    , ('FLS2-00003' , 'C', 0 , 'C', 1 , 'C', 1 , 'D', 0 , 'D', 1
        , '2023-07-14', 'EMPL-0001', 5, 'checked')
    , ('FLS2-00004' , 'C', 0 , 'C', 1 , 'C', 1 , 'D', 0 , 'D', 1
        , '2023-07-14', 'EMPL-0001', 5, 'checked')
    , ('FLS2-00005' , 'C', 0 , 'C', 1 , 'C', 1 , 'D', 0 , 'D', 1
        , '2023-07-14', 'EMPL-0001', 5, 'checked')
;

-- INSERT FLT LS3
INSERT INTO `tbl_flt_ls3`(`fls3_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    , `q6_answer`, `q6_score`
    , `q7_answer`, `q7_score`
    , `q8_answer`, `q8_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS3-00001' , 'D', 1 , 'D', 0 , 'C', 0 , 'D', 0 , 'D', 0 , 'A', 1 , 'D', 1 , 'C', 1 
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
    , ('FLS3-00002' , 'D', 1 , 'D', 0 , 'C', 0 , 'D', 0 , 'D', 0 , 'A', 1 , 'D', 1 , 'C', 1 
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
    , ('FLS3-00003' , 'D', 1 , 'D', 0 , 'C', 0 , 'D', 0 , 'D', 0 , 'A', 1 , 'D', 0 , 'C', 1 
        , '2023-07-14', 'EMPL-0001' , 3 , 'checked')
    , ('FLS3-00004' , 'D', 1 , 'D', 0 , 'C', 0 , 'D', 0 , 'D', 0 , 'A', 1 , 'D', 1 , 'C', 1 
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
    , ('FLS3-00005' , 'D', 1 , 'D', 0 , 'C', 0 , 'D', 0 , 'D', 0 , 'A', 1 , 'D', 1 , 'C', 1 
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
;

-- INSERT FLT LS4
INSERT INTO `tbl_flt_ls4`(`fls4_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    , `q6_answer`, `q6_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS4-00001' , 'C', 1 , 'A', 1 , 'B', 1 , 'D', 1 , 'C', 1 , 'A', 1
        , '2023-07-14', 'EMPL-0001' , 6 , 'checked')
    , ('FLS4-00002' , 'C', 1 , 'A', 1 , 'B', 1 , 'D', 1 , 'C', 1 , 'A', 1
        , '2023-07-14', 'EMPL-0001' , 6 , 'checked')
    , ('FLS4-00003' , 'D', 0 , 'A', 1 , 'B', 1 , 'C', 0 , 'C', 1 , 'A', 1
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
    , ('FLS4-00004' , 'D', 0 , 'A', 1 , 'B', 1 , 'C', 0 , 'C', 1 , 'A', 1
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
    , ('FLS4-00005' , 'D', 0 , 'A', 1 , 'B', 1 , 'C', 0 , 'C', 1 , 'A', 1
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
;

-- INSERT FLT LS5
INSERT INTO `tbl_flt_ls5`(`fls5_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS5-00001', 'D', 1, 'A', 1, 'A', 1, 'C', 1, 'B', 1
        , '2023-07-14', 'EMPL-0001', 5, 'checked')
    , ('FLS5-00002', 'D', 1, 'A', 1, 'A', 1, 'C', 1, 'B', 1
        , '2023-07-14', 'EMPL-0001', 5, 'checked')
    , ('FLS5-00003', 'B', 0, 'B', 0, 'A', 1, 'C', 1, 'B', 1
        , '2023-07-14', 'EMPL-0001', 3, 'checked')
    , ('FLS5-00004', 'B', 0, 'B', 0, 'C', 0, 'C', 1, 'B', 1
        , '2023-07-14', 'EMPL-0001', 2, 'checked')
    , ('FLS5-00005', 'B', 0, 'B', 0, 'C', 0, 'D', 0, 'B', 1
        , '2023-07-14', 'EMPL-0001', 2, 'checked')
;

-- INSERT FLT LS6
INSERT INTO `tbl_flt_ls6`(`fls6_id`
    , `q1_answer`, `q1_score`
    , `q2_answer`, `q2_score`
    , `q3_answer`, `q3_score`
    , `q4_answer`, `q4_score`
    , `q5_answer`, `q5_score`
    , `q6_answer`, `q6_score`
    
    ,`check_date`, `check_by`
    , `total_score`
    , `status`) 
    
    VALUES 
    ('FLS6-00001' , 'D', 1 , 'C', 1 , 'D', 1 , 'C', 1 , 'A', 1 , 'D', 1
        , '2023-07-14', 'EMPL-0001' , 6 , 'checked')
    , ('FLS6-00002' , 'D', 1 , 'C', 1 , 'D', 1 , 'C', 1 , 'A', 1 , 'D', 1
        , '2023-07-14', 'EMPL-0001' , 6 , 'checked')
    , ('FLS6-00003' , 'D', 1 , 'C', 1 , 'C', 0 , 'C', 1 , 'A', 1 , 'D', 1
        , '2023-07-14', 'EMPL-0001' , 5 , 'checked')
    , ('FLS6-00004' , 'D', 1 , 'C', 1 , 'C', 0 , 'D', 0 , 'A', 1 , 'D', 1
        , '2023-07-14', 'EMPL-0001' , 4 , 'checked')
    , ('FLS6-00005' , 'D', 1 , 'C', 1 , 'C', 0 , 'D', 0 , 'D', 0 , 'D', 1
        , '2023-07-14', 'EMPL-0001' , 3 , 'checked')
;

-- INSERT STUDENT FLT
INSERT INTO `tbl_student_flt`(
    `sflt_id`,
    `school_year`,
    `test_period`,
    `student`,
    `fpis`,
    `ls1_eng`,
    `ls1_fil`,
    `ls2`,
    `ls3`,
    `ls4`,
    `ls5`,
    `ls6`,
    `status`
)
VALUES(
    '[value-1]',
    '[value-2]',
    '[value-3]',
    '[value-4]',
    '[value-5]',
    '[value-6]',
    '[value-7]',
    '[value-8]',
    '[value-9]',
    '[value-10]',
    '[value-11]',
    '[value-12]',
    '[value-13]'
);


-- INSERT STUDENT ACCOUNT
INSERT INTO `tbl_accounts` (`acnt_id`, `username`, `password`, `type`) 
    VALUES 
        ('ACNT-10001','136453160522','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10002','517011901717','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10003','136456120450','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10004','136441140382','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10005','136453120376','5f4dcc3b5aa765d61d8327deb882cf99','student')

        , ('ACNT-10006','136453100031','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10007','136456140697','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10008','136453130519','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10009','136441121334','5f4dcc3b5aa765d61d8327deb882cf99','student')
        , ('ACNT-10010','136456141479','5f4dcc3b5aa765d61d8327deb882cf99','student')
;

-- INSERT STUDENT 
INSERT INTO `tbl_student`(`lrn`, `account`, `f_name`, `m_name`, `l_name`, `gender`) 
    VALUES
    ('136453160522','ACNT-10001','Mark Theodore','Anadon','Mesiona','new')
    , ('517011901717','ACNT-10002','Alex Christian','','Avelino','new')
    , ('136456120450','ACNT-10003','John Kenny','Ticala','Denosta','new')
    , ('136441140382','ACNT-10004','Edilberto JR','Fuentes','Igloso','new')
    , ('136453120376','ACNT-10005','Kian','Magno','Maang','new')

    , ('136453100031','ACNT-10006','Ashley','Diaz','Almirol','new')
    , ('136456140697','ACNT-10007','Aira Mae','Gepulle','Castillo','new')
    , ('136453130519','ACNT-10008','Kimberly','Kadil','Labadia','new')
    , ('136441121334','ACNT-10009','Rosedy Marie','Trono','Lavapie','new')
    , ('136456141479','ACNT-10010','Enma Ruth','Mata','Linde','new')

;

INSERT INTO `tbl_student_flt`(
    `sflt_id`,
    `school_year`,
    `test_period`,
    `student`,
    `fpis`,
    `ls1_eng`,
    `ls1_fil`,
    `ls2`,
    `ls3`,
    `ls4`,
    `ls5`,
    `ls6`,
    `status`
)
VALUES
    ('SFLT-00001', 'SHYR-00001', 'TPRD-00001' ,'517011901717', 
        'FPIS-12694', 'FLS1E-00001', 'FLS1F-00001', 'FLS2-00001', 'FLS3-00001', 'FLS4-00001', 'FLS5-00001', 'FLS6-00001',
        'completed')

    , ('SFLT-00002', 'SHYR-00001', 'TPRD-00001' ,'136453160522', 
        'FPIS-19320', 'FLS1E-00002', 'FLS1F-00002', 'FLS2-00002', 'FLS3-00002', 'FLS4-00002', 'FLS5-00002', 'FLS6-00002',
        'completed')

    , ('SFLT-00003', 'SHYR-00001', 'TPRD-00001' ,'136453100031', 
        'FPIS-34679', 'FLS1E-00003', 'FLS1F-00003', 'FLS2-00003', 'FLS3-00003', 'FLS4-00003', 'FLS5-00003', 'FLS6-00003',
        'completed')

    , ('SFLT-00004', 'SHYR-00001', 'TPRD-00001' ,'136456120450', 
        'FPIS-46238', 'FLS1E-00004', 'FLS1F-00004', 'FLS2-00004', 'FLS3-00004', 'FLS4-00004', 'FLS5-00004', 'FLS6-00004',
        'completed')

    , ('SFLT-00005', 'SHYR-00001', 'TPRD-00001' ,'136456140697', 
        'FPIS-74935', 'FLS1E-00005', 'FLS1F-00005', 'FLS2-00005', 'FLS3-00005', 'FLS4-00005', 'FLS5-00005', 'FLS6-00005',
        'completed')
;
-- Stop Here