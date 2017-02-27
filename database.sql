-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2017 at 10:14 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codingnuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_account` varchar(25) NOT NULL,
  `a_password` varchar(25) NOT NULL,
  `a_img` varchar(255) NOT NULL,
  `a_nickname` varchar(255) NOT NULL,
  `a_level` int(11) NOT NULL DEFAULT '1' COMMENT '1 = editor , 2 = master'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理者and編輯者資料' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_account`, `a_password`, `a_img`, `a_nickname`, `a_level`) VALUES
(1, 'galedr', '123', 'http://localhost/php/gitProject/codingNuts/assets/adminImg/galedr.jpg', '蓋爾蘿莉控', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `a_id` int(11) NOT NULL,
  `a_title` varchar(255) NOT NULL,
  `c_title` varchar(11) NOT NULL COMMENT 'FK - category',
  `a_intro` varchar(255) NOT NULL,
  `a_content` varchar(8000) NOT NULL,
  `a_img` varchar(255) NOT NULL,
  `a_nickname` varchar(11) NOT NULL COMMENT 'FK - admin',
  `a_tag` varchar(255) NOT NULL,
  `a_datetime` datetime NOT NULL,
  `a_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = 上架 , 2 = 下架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章資料' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`a_id`, `a_title`, `c_title`, `a_intro`, `a_content`, `a_img`, `a_nickname`, `a_tag`, `a_datetime`, `a_status`) VALUES
(1, '測試文章標題', '測試分類02', '', '<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/1285266364581.jpg\" style=\"height:225px; width:400px\" /></p>\\r\\n\\r\\n<p>（中央社記者劉世怡台北22日電）W飯店命案，台北地檢署指出，女模因毒品中毒出現神智不清，在場者竟未將女模送醫急救，反而通知吳姓密醫到場打「排毒針」點滴；吳姓密醫部分，另案偵辦。</p>\\r\\n\\r\\n<p>檢方指出，「土豪哥」朱家龍等人在</p>\\r\\n\\r\\n<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/1285530367864(1).jpg\" style=\"height:250px; width:400px\" /></p>\\r\\n\\r\\n<p>去年12月2日晚間一同至W HOTEL內舉辦毒品派對，陸續邀集友人到場玩樂，並邀集傳播小姐「曼曼」、及郭姓女模到場作陪助興：朱家龍再找張姓男子等人到場販賣摻有毒品成分的金色小惡魔咖啡包十幾包，無償供參與派對人員施用。</p>\\r\\n\\r\\n<p>參與派對的人以骰盅玩遊戲，約定以飲用毒品咖啡包或酒類作為遊戲輸家的懲罰，同時房內的人均可自由取用放置於桌上的毒品。</p>\\r\\n\\r\\n<p>直至12月6日凌晨1時許，朱家龍等人一同吸毒玩樂超過40小時，郭姓女模均未曾闔眼休息，並持續混合施用多種不同成分的毒品及冰火調酒，鮮少攝取水分；同日下午2時許，「曼曼」因混毒而感到身體不適，並出現眼神渙散、語無倫次、撞牆、過於興奮，最後昏睡等異狀；朱家龍明知派對中已有人因施用毒品而發生異狀，竟為圖繼續玩樂，仍持續舉辦毒品派對，任「曼曼」於房內昏睡不止。</p>\\r\\n\\r\\n<p>後來，郭姓女模在7日凌晨4時許開始，因混合多種毒品中毒而出現反覆穿脫衣服、神智不清等異狀，在場的朱家龍友人見狀，未立即將郭女送醫急救，反而通知吳姓密醫到場為郭女施打俗稱「排毒針」點滴。</p>\\r\\n', 'http://localhost/php/gitProject/codingNuts/assets/img/1285266360225.jpg', '蓋爾蘿莉控', '', '2017-02-28 01:49:05', 1),
(3, '測試文章02', '測試修改', '', '<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/1290827020138(1).jpg\" style=\"height:250px; width:400px\" /></p>\\r\\n\\r\\n<p>談到「波麗士大人」，多數業務員第一反應是：這是最難攻下的族群之一。不過，對於陳妍靜而言，警察卻是含金量最高的客群。入行第8個月，她拿到警察的第一張保單。第二年，光是簽下的警察保單就多達34張，而且其中一人簽下她從業以來保額最高的保單，合計多達1千萬。</p>\\r\\n\\r\\n<p>靠著波麗士大人，她單年度保費收入超過4百萬元，獲得MDRT（百萬圓桌，全球頂尖的壽險、金融業人士組成的組織）資格。入行5年多來，她有近3百位保戶，其中警察占6成。</p>\\r\\n\\r\\n<p><strong>大三入行爸媽不挺</strong><br />\\r\\n<strong>同學家長飆罵：把女兒的錢騙走了</strong></p>\\r\\n\\r\\n<p>不過，陳妍靜從當上業務到接觸警察，都是無心插柳。她就讀東吳企管系三年級時，在學長、富邦人壽富子通訊處經理王志豪鼓勵下參加面試。原本期待當行政助理就好，但念及當業務挑戰性高，且更有機會賺高薪，便毅然選擇後者。</p>\\r\\n\\r\\n<p>孰料，這是夢魘的開始。父母知道女兒大學未畢業就要當壽險業務，怒斥「花這麼多錢讓妳念大學，妳去做這種高中畢業就能做的工作？」</p>\\r\\n\\r\\n<p>入行4個多月時，有一位高中同學將從小到大存下、約20萬元紅包錢，向她買了一筆儲蓄險。當晚該同學突然來電，「我同學丟一句：我媽找妳，然後把電話拿給媽媽，她媽媽狂罵我說：陳小姐，妳很厲害，把我家女兒騙得團團轉，把她的錢都騙走了。」她試圖解釋，但對方完全不聽，還反諷「翅膀硬了，大學生不好好念書，拉什麼保險？」罵了20分鐘才掛電話。</p>\\r\\n\\r\\n<p><strong>警察同學救了她的業績</strong><br />\\r\\n<strong>收入高、愛存錢，易成交儲蓄險</strong></p>\\r\\n\\r\\n<p>陳妍靜入行前三季業績都沒達標，也沒料到會敬陪末座這麼久，每天回家前還得收拾情緒，不能讓原本就反對到底的父母看到自己的挫敗，或冷不防丟出一句：「妳今天又騙幾個人了？」左支右絀下，她每天都在考慮辭職。</p>\\r\\n\\r\\n<p>硬撐了8個多月，上天終於為她開啟一扇窗。她聯絡到一位現為警察的國中同學，親自拜訪後，當天就成交到一筆10年期1百萬儲蓄險。透過這次成交，她也發現，警察收入甚佳，以他的同學來說，22歲月薪就有5.3萬，儲蓄險需求頗高，「只要先談存錢，就非常好談。」</p>\\r\\n\\r\\n<p>「後來他又介紹兩個警察客戶給我認識，就靠兩個再慢慢拓展，這兩個其中一個又介紹六個給我，我又去一一拜訪，這些警察有些就會再幫我介紹其他警察，可能兩個、三個，就這樣慢慢開枝散葉出去。」陳妍靜說，現在雙北市有超過20個警局，都有她的保戶。</p>\\r\\n\\r\\n<p>不過，要服務波麗士大人，可不太容易。警察不僅人際圈封閉，工作內容更是充斥著嫌犯、車禍或犯罪現場，工作形態使然，多數警察與初次見面的人很難「相見歡」，習慣先板著一張臉觀察對方。</p>\\r\\n\\r\\n<p>另外，警察客群難耕耘之處，還有一點：時間的高度不確定性。她與警察約好時間後趕到現場，因為對方臨時要執勤而爽約是家常便飯。</p>\\r\\n\\r\\n<p>靠著警察客戶，陳妍靜薪水大增，去年還幫爸爸買車，原本抵死不讓她碰親友的父母，現在會主動幫她開口：「富邦某個儲蓄險不錯，要不要看看？」難道不擔心分享心法後，別的壽險業務會如法炮製？她很有自信的說：「不會，別人打不進去，也未必受得了警察。」而且她深信，警察這群客層還有很大的處女地帶。</p>\\r\\n\\r\\n<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/wallpaper-142118.png\" style=\"height:250px; width:400px\" /></p>\\r\\n', 'http://localhost/php/gitProject/codingNuts/assets/img/1285530367864.jpg', '蓋爾蘿莉控', '測試標籤,測試修改', '2017-02-28 02:25:21', 1),
(4, '測試文章03', '測試分類02', '', '<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/1290827020138(1).jpg\" style=\"height:250px; width:400px\" /></p>\\r\\n\\r\\n<p>談到「波麗士大人」，多數業務員第一反應是：這是最難攻下的族群之一。不過，對於陳妍靜而言，警察卻是含金量最高的客群。入行第8個月，她拿到警察的第一張保單。第二年，光是簽下的警察保單就多達34張，而且其中一人簽下她從業以來保額最高的保單，合計多達1千萬。</p>\\r\\n\\r\\n<p>靠著波麗士大人，她單年度保費收入超過4百萬元，獲得MDRT（百萬圓桌，全球頂尖的壽險、金融業人士組成的組織）資格。入行5年多來，她有近3百位保戶，其中警察占6成。</p>\\r\\n\\r\\n<p><strong>大三入行爸媽不挺</strong><br />\\r\\n<strong>同學家長飆罵：把女兒的錢騙走了</strong></p>\\r\\n\\r\\n<p>不過，陳妍靜從當上業務到接觸警察，都是無心插柳。她就讀東吳企管系三年級時，在學長、富邦人壽富子通訊處經理王志豪鼓勵下參加面試。原本期待當行政助理就好，但念及當業務挑戰性高，且更有機會賺高薪，便毅然選擇後者。</p>\\r\\n\\r\\n<p>孰料，這是夢魘的開始。父母知道女兒大學未畢業就要當壽險業務，怒斥「花這麼多錢讓妳念大學，妳去做這種高中畢業就能做的工作？」</p>\\r\\n\\r\\n<p>入行4個多月時，有一位高中同學將從小到大存下、約20萬元紅包錢，向她買了一筆儲蓄險。當晚該同學突然來電，「我同學丟一句：我媽找妳，然後把電話拿給媽媽，她媽媽狂罵我說：陳小姐，妳很厲害，把我家女兒騙得團團轉，把她的錢都騙走了。」她試圖解釋，但對方完全不聽，還反諷「翅膀硬了，大學生不好好念書，拉什麼保險？」罵了20分鐘才掛電話。</p>\\r\\n\\r\\n<p><strong>警察同學救了她的業績</strong><br />\\r\\n<strong>收入高、愛存錢，易成交儲蓄險</strong></p>\\r\\n\\r\\n<p>陳妍靜入行前三季業績都沒達標，也沒料到會敬陪末座這麼久，每天回家前還得收拾情緒，不能讓原本就反對到底的父母看到自己的挫敗，或冷不防丟出一句：「妳今天又騙幾個人了？」左支右絀下，她每天都在考慮辭職。</p>\\r\\n\\r\\n<p>硬撐了8個多月，上天終於為她開啟一扇窗。她聯絡到一位現為警察的國中同學，親自拜訪後，當天就成交到一筆10年期1百萬儲蓄險。透過這次成交，她也發現，警察收入甚佳，以他的同學來說，22歲月薪就有5.3萬，儲蓄險需求頗高，「只要先談存錢，就非常好談。」</p>\\r\\n\\r\\n<p>「後來他又介紹兩個警察客戶給我認識，就靠兩個再慢慢拓展，這兩個其中一個又介紹六個給我，我又去一一拜訪，這些警察有些就會再幫我介紹其他警察，可能兩個、三個，就這樣慢慢開枝散葉出去。」陳妍靜說，現在雙北市有超過20個警局，都有她的保戶。</p>\\r\\n\\r\\n<p>不過，要服務波麗士大人，可不太容易。警察不僅人際圈封閉，工作內容更是充斥著嫌犯、車禍或犯罪現場，工作形態使然，多數警察與初次見面的人很難「相見歡」，習慣先板著一張臉觀察對方。</p>\\r\\n\\r\\n<p>另外，警察客群難耕耘之處，還有一點：時間的高度不確定性。她與警察約好時間後趕到現場，因為對方臨時要執勤而爽約是家常便飯。</p>\\r\\n\\r\\n<p>靠著警察客戶，陳妍靜薪水大增，去年還幫爸爸買車，原本抵死不讓她碰親友的父母，現在會主動幫她開口：「富邦某個儲蓄險不錯，要不要看看？」難道不擔心分享心法後，別的壽險業務會如法炮製？她很有自信的說：「不會，別人打不進去，也未必受得了警察。」而且她深信，警察這群客層還有很大的處女地帶。</p>\\r\\n\\r\\n<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/wallpaper-142118.png\" style=\"height:250px; width:400px\" /></p>\\r\\n', 'http://localhost/php/gitProject/codingNuts/assets/img/1285530367864.jpg', '蓋爾蘿莉控', '測試標籤,測試修改', '2017-02-28 02:25:21', 1),
(5, '測試修改', '測試修改', '', '<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/1289391760743(1).png\" style=\"height:250px; width:400px\" /></p>\\r\\n\\r\\n<p>談到「波麗士大人」，多數業務員第一反應是：這是最難攻下的族群之一。不過，對於陳妍靜而言，警察卻是含金量最高的客群。入行第8個月，她拿到警察的第一張保單。第二年，光是簽下的警察保單就多達34張，而且其中一人簽下她從業以來保額最高的保單，合計多達1千萬。</p>\\r\\n\\r\\n<p>靠著波麗士大人，她單年度保費收入超過4百萬元，獲得MDRT（百萬圓桌，全球頂尖的壽險、金融業人士組成的組織）資格。入行5年多來，她有近3百位保戶，其中警察占6成。</p>\\r\\n\\r\\n<p><strong>大三入行爸媽不挺</strong><br />\\r\\n<strong>同學家長飆罵：把女兒的錢騙走了</strong></p>\\r\\n\\r\\n<p>不過，陳妍靜從當上業務到接觸警察，都是無心插柳。她就讀東吳企管系三年級時，在學長、富邦人壽富子通訊處經理王志豪鼓勵下參加面試。原本期待當行政助理就好，但念及當業務挑戰性高，且更有機會賺高薪，便毅然選擇後者。</p>\\r\\n\\r\\n<p>孰料，這是夢魘的開始。父母知道女兒大學未畢業就要當壽險業務，怒斥「花這麼多錢讓妳念大學，妳去做這種高中畢業就能做的工作？」</p>\\r\\n\\r\\n<p>入行4個多月時，有一位高中同學將從小到大存下、約20萬元紅包錢，向她買了一筆儲蓄險。當晚該同學突然來電，「我同學丟一句：我媽找妳，然後把電話拿給媽媽，她媽媽狂罵我說：陳小姐，妳很厲害，把我家女兒騙得團團轉，把她的錢都騙走了。」她試圖解釋，但對方完全不聽，還反諷「翅膀硬了，大學生不好好念書，拉什麼保險？」罵了20分鐘才掛電話。</p>\\r\\n\\r\\n<p><strong>警察同學救了她的業績</strong><br />\\r\\n<strong>收入高、愛存錢，易成交儲蓄險</strong></p>\\r\\n\\r\\n<p>陳妍靜入行前三季業績都沒達標，也沒料到會敬陪末座這麼久，每天回家前還得收拾情緒，不能讓原本就反對到底的父母看到自己的挫敗，或冷不防丟出一句：「妳今天又騙幾個人了？」左支右絀下，她每天都在考慮辭職。</p>\\r\\n\\r\\n<p>硬撐了8個多月，上天終於為她開啟一扇窗。她聯絡到一位現為警察的國中同學，親自拜訪後，當天就成交到一筆10年期1百萬儲蓄險。透過這次成交，她也發現，警察收入甚佳，以他的同學來說，22歲月薪就有5.3萬，儲蓄險需求頗高，「只要先談存錢，就非常好談。」</p>\\r\\n\\r\\n<p>「後來他又介紹兩個警察客戶給我認識，就靠兩個再慢慢拓展，這兩個其中一個又介紹六個給我，我又去一一拜訪，這些警察有些就會再幫我介紹其他警察，可能兩個、三個，就這樣慢慢開枝散葉出去。」陳妍靜說，現在雙北市有超過20個警局，都有她的保戶。</p>\\r\\n\\r\\n<p>不過，要服務波麗士大人，可不太容易。警察不僅人際圈封閉，工作內容更是充斥著嫌犯、車禍或犯罪現場，工作形態使然，多數警察與初次見面的人很難「相見歡」，習慣先板著一張臉觀察對方。</p>\\r\\n\\r\\n<p>另外，警察客群難耕耘之處，還有一點：時間的高度不確定性。她與警察約好時間後趕到現場，因為對方臨時要執勤而爽約是家常便飯。</p>\\r\\n\\r\\n<p>靠著警察客戶，陳妍靜薪水大增，去年還幫爸爸買車，原本抵死不讓她碰親友的父母，現在會主動幫她開口：「富邦某個儲蓄險不錯，要不要看看？」難道不擔心分享心法後，別的壽險業務會如法炮製？她很有自信的說：「不會，別人打不進去，也未必受得了警察。」而且她深信，警察這群客層還有很大的處女地帶。</p>\\r\\n\\r\\n<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/wallpaper-142118.png\" style=\"height:250px; width:400px\" /></p>\\r\\n', 'http://localhost/php/gitProject/codingNuts/assets/img/1289391760743.png', '蓋爾蘿莉控', '', '2017-02-28 02:25:21', 1),
(6, '測試crontab 05', '無分類', '日本的「超值星期五」活動今天起正式上路，避免過勞死和振興經濟是活動的兩大目標。\\r\\n\\r\\n去年底，日本廣告業巨擘電通公司廿四歲新進員工高橋茉莉自殺，被判定是過勞死，老闆被迫請辭。高橋茉莉每個月加班超過一百小時，而日本每年大約有兩千起死亡，都與過勞有關。\\r\\n\\r\\n過勞死的現象存在已久，日本政府以前也試圖解決，像是增加國定假日、鼓勵員工多休假，可是勞動省官員自己每年都只休了一半的假。而且，搞彈性工時，但工作總時數不變；每月的最後一個星期五提前下班，其他天必須補足工時甚至加班。', '<p><img alt=\"\" src=\"http://localhost/php/gitProject/codingNuts/assets/img/files/1289391760743(2).png\" style=\"height:250px; width:400px\" /></p>\\r\\n\\r\\n<p>&nbsp;</p>\\r\\n\\r\\n<p>日本的「超值星期五」活動今天起正式上路，避免過勞死和振興經濟是活動的兩大目標。</p>\\r\\n\\r\\n<p>去年底，日本廣告業巨擘電通公司廿四歲新進員工高橋茉莉自殺，被判定是過勞死，老闆被迫請辭。高橋茉莉每個月加班超過一百小時，而日本每年大約有兩千起死亡，都與過勞有關。</p>\\r\\n\\r\\n<p>過勞死的現象存在已久，日本政府以前也試圖解決，像是增加國定假日、鼓勵員工多休假，可是勞動省官員自己每年都只休了一半的假。而且，搞彈性工時，但工作總時數不變；每月的最後一個星期五提前下班，其他天必須補足工時甚至加班。</p>\\r\\n\\r\\n<p>二○一四年，日本有百分之廿二的人每周工作超過四十九小時，南韓的比率是百分之卅五，所以也想跟進「超值星期五」；美國則為百分之十六。</p>\\r\\n\\r\\n<p>然而，工時長不表示生產力就高。日本勞動政策研究院二○一四年的統計顯示，日本人每周工時在七大工業國居冠，生產力卻墊底。推動「超值星期五」，不光是為員工設想，對政府與產業都有好處。</p>\\r\\n\\r\\n<p>日本的經濟陷入「失落的廿年」，消費意願和出生率都低，工時太長被視為幫凶。「超值星期五」讓民眾有時間吃喝玩樂，帶動消費；但是人事成本變高，中小企業吃不消。</p>\\r\\n\\r\\n<p>經濟產業省大臣世耕弘成率先表示，日後每逢「超值星期五」，下午三點以後他都不安排公務會面。但有多少企業願意配合，才是政策成敗的關鍵。</p>\\r\\n\\r\\n<p>英國廣播公司指出，日本經濟表現走軟，終身雇用制隨之式微，年輕一代對企業的忠誠度跟著降低，也許會比較願意在特定的星期五提早下班，追求工作與生活間更好的平衡，有助於推動「超值星期五」。</p>\\r\\n', 'http://localhost/php/gitProject/codingNuts/assets/img/1285530367864.jpg', '蓋爾蘿莉控', '新聞,好爽', '2017-02-28 03:03:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `c_id` int(11) NOT NULL COMMENT 'FK - category',
  `a_id` int(11) NOT NULL COMMENT 'FK - article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章與分類的雙關聯資料表';

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`c_id`, `a_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `a_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`a_id`, `t_id`) VALUES
(2, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分類' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_title`) VALUES
(1, '無分類'),
(3, '測試分類02'),
(4, '測試修改'),
(5, '新聞');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `m_account` varchar(25) NOT NULL,
  `m_password` varchar(25) NOT NULL,
  `m_img` varchar(255) NOT NULL,
  `m_nickname` varchar(25) NOT NULL,
  `m_status` enum('正常','停權') NOT NULL DEFAULT '正常'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='會員資料' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_account`, `m_password`, `m_img`, `m_nickname`, `m_status`) VALUES
(1, 'galedr', '123', 'http://localhost/php/gitProject/codingNuts/assets/img/memberImg/galedr/galedr.jpg', '蓋爾蘿莉控', '正常'),
(2, 'test01', '123', 'http://localhost/php/gitProject/codingNuts/assets/img/memberImg/test01/1285266360225.jpg', '測試帳號01', '正常');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `t_id` int(11) NOT NULL,
  `t_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`t_id`, `t_title`) VALUES
(1, '刺激'),
(2, '測試標籤'),
(3, '測試標籤二'),
(4, '新聞'),
(5, '好爽');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;