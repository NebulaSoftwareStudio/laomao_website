SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `laomao`
--
CREATE DATABASE IF NOT EXISTS `laomao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laomao`;

-- --------------------------------------------------------

--
-- 表的结构 `ads`
--

CREATE TABLE `ads` (
  `ID` int(11) NOT NULL COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `image` varchar(1000) NOT NULL COMMENT '图像',
  `url` varchar(255) NOT NULL COMMENT '广告链接',
  `time` datetime NOT NULL COMMENT '提交时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `kotoba`
--

CREATE TABLE `kotoba` (
  `ID` int(11) NOT NULL COMMENT '主键ID',
  `content` varchar(5000) NOT NULL COMMENT '内容',
  `author` varchar(255) NOT NULL COMMENT '著者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `kotoba`
--

INSERT INTO `kotoba` (`ID`, `content`, `author`) VALUES
(1, '真正的无知不是知识的缺乏，而是拒绝获取知识。', '卡尔·波普尔'),
(2, '首先他们无视于你，而后是嘲笑你，接着是批斗你，再来就是你的胜利之日。', '甘地'),
(3, '尊重人不应该胜于尊重真理。', '柏拉图'),
(4, '恐惧比利剑更伤人', '《冰与火之歌》'),
(5, '通往地狱的路，都是由善意铺成的', '哈耶克'),
(6, '实力永远意味着责任和危险。', '罗斯福. T.'),
(7, '想想看吧，已经有一百万只猴子坐在一百万台打字机旁，可Usenet就是比不上莎士比。', 'Blair Houghton'),
(8, '计算机没什么用。他们只会告诉你答案。', '毕加索'),
(9, '任何有可能出错的事将会出错', '墨菲定理'),
(10, '不管我们已经观察到多少只白天鹅，都不能确立“所有天鹅皆为白色”的理论。只要看见一只黑天鹅就可以驳倒它。', '卡尔·波普尔'),
(11, '活了一百年却只能记住30M字节是荒谬的。你知道，这比一张压缩盘还要少。人类境况正在变得日趋退。', 'Marvin Minsky'),
(12, '要节约用水，尽量和女友一起洗澡', '加菲猫'),
(13, '我并不同意你的观点，但是我誓死捍卫你说话的权利', '伏尔泰'),
(14, '彼窃钩者诛，窃国者为诸侯。', '庄子'),
(15, '我注意过，即便是那些声称一切都是命中注定的而且我们无力改变的人，在过马路之前都会左右看。', '史提芬·霍金'),
(16, '人们还往往把真理和错误混在一起去教人，而坚持的却是错误。', '歌德'),
(17, '与魔鬼战斗的人，应当小心自己不要成为魔鬼。当你远远凝视深渊时，深渊也在凝视你。', '尼采'),
(18, '自由的保证是什么?是对自己不再感到羞耻。', '尼采'),
(19, '成功的骗子，不必再说谎以求生，因为被骗的人，全成为他的拥护者，我再说什么也是枉然。', '莎士比亚'),
(20, '真理是时间之产物，而不是权威之产物', '弗兰西斯·培根'),
(21, '硬件:计算机系统中可被踢的部分。', 'Jeff Pesis'),
(22, '没有人足够完美，以至可以未经别人同意就支配别人。', '林肯'),
(23, '所谓科学的论辩，从总体上来说则是没有多大效果的，更不用说论辩几乎总是各持己见的这个事实。', '弗洛伊德'),
(24, '别向医生和律师提供错误的消息。', '匿名用户'),
(25, '花代价所换来的一点才智，抵过别人传授的数倍不止。', '匿名用户'),
(26, '已经集中起来的权力不会由于创造它的那些人的良好愿望而变为无害。', '弗里德曼'),
(27, '只有两种编程语言：一种是天天挨骂的，另一种是没人用', 'Bjarne Stroustrup'),
(28, '百善孝为先，论心不论迹，论迹贫家无孝子；万恶淫为首，论迹不论心，论心世上少完人', '匿名用户'),
(29, '程序员的问题是你无法预料他在做什么，直到为时已晚', 'Seymour Cray'),
(30, '在所有的禁欲道德里，人把自己的一部分视为神，加以崇拜，因此被迫把其他部分加以恶魔化。', '尼采'),
(31, '如果你怀疑自己，那么你的立足点确实不稳固了。', '匿名用户'),
(32, '什么都比不上厄运更能磨练人的德性。', '莎士比亚'),
(33, '尊严不值钱，却是我唯一真正拥有的！', '匿名用户'),
(35, '渴求美德而非奖赏。', '匿名用户'),
(36, '所有小说写的都是真事。怕吓着你们才叫小声说。', '王朔'),
(37, '当某人告诉你：“不是钱，而是原则问题”时，十有八九就是钱的问题。', '胡巴尔德'),
(38, '一个人能够洋洋得意地随著军乐队在四列纵队里行进，单凭这一点就足以使我对他轻视。他所以长了一个大脑，只是出于误会；单单一根脊髓就可满足他的全部需要了。文明国家的这种罪恶的渊薮，应当尽快加以消灭。由命令而产生的勇敢行为，毫无意义的暴行，以及在爱国主义名义下一切可恶的胡闹，所有这些都使我深恶痛绝。', '爱因斯坦'),
(39, '想了解一个人的个性，那就赋予他权力。', '林肯'),
(40, '每一个社会都表扬活着的顺从者和死去的叛逆者。', '米扬·麦克劳克林'),
(41, '如果我们过于爽快地承认失败，就可能使自己发觉不了我们非常接近于正确。', '卡尔·波普尔'),
(42, '在这个世界上我只确定一件事。那就是人确定的事情越少越好。', '毛姆'),
(43, '我不像你一样是一个机器人，让磁盘把我淹没，除非它们是小甜饼，并且只在嘴里。', '匿名用户'),
(44, '对骄傲的人不要谦逊，对谦逊的人不要骄傲。', '托玛斯·杰弗逊'),
(45, '你不问我，我就不会说谎话。', '匿名用户'),
(46, '我向星星许了个愿。我并不是真的相信它，但是反正也是免费的，而且也没有证据证明它不灵。', '加菲猫'),
(47, '所谓爱国心，是指你既生为这个国家的国民，对于这个国家，当比对其他一切的国家信仰得高贵优越。', '萧伯纳'),
(48, '计算机就跟比基尼一样，省去了人们许多的胡思乱想。', '萨姆·尤因'),
(49, '坚信比谎言更是真理的敌人。', '尼采'),
(50, '每个人都受两种教育，一种来自别人，另一种更重要的是来自自己。', '爱德华·吉本'),
(51, '所谓现实只不过是一个错觉，虽然这个错觉非常持久。', '爱因斯坦'),
(52, '以眼还眼，世界只会更盲目。', '甘地'),
(53, '会玩的人才会学', '匿名用户'),
(54, '不管我们已经观察到多少只白天鹅，都不能确立“所有天鹅皆为白色”的理论。只要看见一只黑天鹅就可以驳倒它。', '卡尔·波普尔'),
(55, '如果你想走到高处，就要使用自己的两条腿！不要让别人把你抬到高处；不要坐在别人的背上和头上。 ', '尼采'),
(56, '在认识一切事物之后，人才能认识自己，因为事物仅仅是人的界限。', '尼采'),
(57, '实现明天理想的唯一障碍是今天的疑虑。', '匿名用户'),
(58, '疑人先自疑，律人先律己', '匿名用户'),
(59, '柔和回答， 使怒消退。 言语暴戾， 触动怒气', '箴言篇 15:1'),
(60, '为眼睛近视者指引道路是很费力的，因为你不能对他说：“看见十哩外的教堂吗?朝这个方向走。', '维特根斯坦'),
(61, '我们所需要的，不是天才，不是玩世不恭者，不是愤世嫉俗者，不是机敏的策略家，而是真挚的，坦诚的人。要使我们能够找到重返纯朴与真诚的道路，我们的精神包容量足够地充分，我们自身的正直足够地问心无愧了吗', '朋霍费尔'),
(62, '世界上只有两个东西是无限的，一为宇宙，一为人类的愚蠢，我所不能肯定的乃是前者。', '爱因斯坦'),
(63, '你在活着的同时，也在学习着，无论如何，你活着。', '道格拉斯·亚当斯'),
(64, '不要恐慌', '匿名用户'),
(65, '工作撵跑三个魔鬼：无聊、堕落和贫穷。', '匿名用户'),
(66, '读古人的书，一方面要知道古人聪明到怎样，一方面也要知道古人傻到怎样。', '胡适'),
(67, '任何人均有其价值', '匿名用户'),
(68, '法律必须被信仰，否则形同虚设。', '伯尔曼'),
(69, '宗教上最深的误解——认为坏人没有宗教。', '尼采'),
(70, '有这么多人盲目相信360杀毒软件，可真是笑死我了！那玩意的安全程度就跟洪都拉斯街头的妓女一样。你们怎么不直接把写好自己银行卡信息的卡片送过去交给他们呢？', '莱斯特·克瑞斯特'),
(71, '拜托不要再送玩具给我了，我不会对着摄像头做那种事的。', '特蕾西迪圣塔'),
(72, '既然像螃蟹这样的东西，人们都很爱吃，那么蜘蛛也一定有人吃过，只不过后来知道不好吃才不吃了，但是第一个吃螃蟹的人一定是个勇士。', '鲁迅'),
(73, '冬天已经到来，春天还会远吗？', '雪莱'),
(74, '罗马帝国灭亡的其中一个主要原因是他们没有0 - 这样他们就没法给自己的C程序指明成功退出的路', 'Robert Firth'),
(75, '你不问我，我就不会说谎话。', '匿名用户'),
(76, '也许我是错而你是对，但只有我们一起努力，才能更接近真理。', '卡尔·波普尔'),
(77, '太阳绝不为它所做的善事后悔，也从不指望任何报酬。', '匿名用户'),
(78, '发现可能性的界限的唯一办法就是越过这个界限，到不可能中去。', '阿瑟·克拉克'),
(79, '工欲善其事，必先利其器。居是邦，事其大夫之贤者，友其士之仁者。', '《论语·卫灵公》'),
(80, '爱是一种能穿越所有维度的矢量', '匿名用户');

-- --------------------------------------------------------

--
-- 表的结构 `rss_news`
--

CREATE TABLE `rss_news` (
  `ID` int(11) NOT NULL COMMENT '编号',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `link` varchar(255) NOT NULL COMMENT '链接',
  `description` varchar(1000) NOT NULL COMMENT '概述',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `content` longtext NOT NULL COMMENT '内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `site_list`
--

CREATE TABLE `site_list` (
  `ID` int(11) NOT NULL COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `description` varchar(255) NOT NULL COMMENT '介绍',
  `image` varchar(1000) NOT NULL COMMENT '图标',
  `url` varchar(1000) NOT NULL COMMENT '链接',
  `classify` varchar(255) NOT NULL COMMENT '分类'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `site_list`
--

INSERT INTO `site_list` (`ID`, `name`, `description`, `image`, `url`, `classify`) VALUES
(0, '维咔VikACG', '肥宅们的欢乐家园', 'assets/images/sites/vikacg.jpg', 'https://www.vikacg.com', '媒体与娱乐'),
(1, 'Twitter', '世界上正在发生的事情，以及人们的热烈讨论。', 'assets/images/sites/twitter.jpg', 'https://twitter.com', '媒体与娱乐'),
(2, 'Telegram', '安全、免费、整洁、多平台、分布式的即时通讯应用。', 'assets/images/sites/telegram.jpg', 'https://web.telegram.org', '媒体与娱乐'),
(3, 'Skype', '使用 Skype 轻松地保持联系：交谈。聊天。协作。', 'assets/images/sites/skype.jpg', 'https://web.skype.com', '媒体与娱乐'),
(4, '支付宝', '支付宝，知托付！', 'assets/images/sites/alipay.jpg', 'https://www.alipay.com', '金融与服务'),
(5, '微信支付商户平台', '中国领先的第三方支付平台 —— 微信支付提供安全快捷的支付方式', 'assets/images/sites/wechat_pay.jpg', 'https://pay.weixin.qq.com', '金融与服务'),
(6, 'PayPal 贝宝中国', '外贸收款，首选PayPal —— 全球通用、卖家保障、方便快捷。逾 2 亿人使用的便捷外贸支付方式', 'assets/images/sites/paypal.jpg', 'https://www.paypal.com', '金融与服务'),
(7, 'Visa', '心驰所向 —— 一流的全球支付技术，为消费者、企业、发卡方和政府提供支持', 'assets/images/sites/visa.jpg', 'https://www.visa.com.cn', '金融与服务'),
(8, 'BAWSAQ', '面对人生的荣辱浮沉。', 'assets/images/sites/bawsaq.jpg', 'https://bawsaq.laomao.website', '金融与服务'),
(9, '洛圣都花园银行', '投资极受欢迎的银行，才是您的利益所在', 'assets/images/sites/mazebank.jpg', 'https://mazebank.laomao.website', '金融与服务'),
(10, '中国铁路12306', '12306铁道部火车票网上订票唯一官网 / 铁路客户服务中心', 'assets/images/sites/12306.jpg', 'https://www.12306.cn', '旅游与交通'),
(11, 'SpaceX', 'Dragon系列的航天器及可部分重复使用的猎鹰1号和猎鹰9号运载火箭能大幅降低成本，提高太空服务', 'assets/images/sites/spacex.jpg', 'https://www.spacex.com', '旅游与交通'),
(12, '一汽·红旗汽车', '无论是行政级座驾，还是家用轿车，红旗能够完美满足您的用车需求。', 'assets/images/sites/hongqi.jpg', 'http://hongqi.faw.cn', '旅游与交通'),
(13, '波音飞机公司', '波音新一代飞机具有最佳灵活性、可靠性及高效率等特点，完美承载您的飞行梦想。', 'assets/images/sites/boeing.jpg', 'http://www.boeing.cn', '旅游与交通'),
(14, '飞猪', '一站式旅游预订平台，提供近万家景点门票、特价机票、出国旅游、周边游、自驾游及酒店预订服务。', 'assets/images/sites/feizhu.jpg', 'https://www.fliggy.com', '旅游与交通'),
(15, 'Pornhub', '在纷乱的世界，什么时候最需要Pornhub的慰藉？', 'assets/images/ads/ads3.jpg', 'https://cn.pornhub.com', '时尚与健康'),
(16, 'Solitot 奇客中国', '奇客的资讯，重要的东西', 'assets/images/sites/solidot.jpg', 'https://www.solidot.org', '媒体与娱乐'),
(17, '哔咔漫画 PicACG', '哔咔漫画 2.1 公测版现已推出。', 'assets/images/sites/picacg.jpg', 'http://picacomic.com', '时尚与健康'),
(18, 'Avgle.io', 'Avgle 资源检索系统。结合人工智能与机器学习技术，您可以用更快的速度到达检索目的地。', 'assets/images/sites/avgle.jpg', 'https://avgle.io', '时尚与健康'),
(19, '怡萱动漫', '怡萱动漫致力于为所有动漫迷们免费提供最新最快的高清动画下载及在线观看资源，它是专业日本动漫下载视听领域的综合网站', 'assets/images/sites/yxdm.jpg', 'http://www.yxdm.me', '媒体与娱乐'),
(20, 'LittleSkin', '快速、可靠的公益 Minecraft 皮肤站', 'assets/images/sites/littleskin.jpg', 'https://mcskin.littleservice.cn', '媒体与娱乐'),
(21, 'LSPIMG 美图鉴赏', '看看就行，别动手……', 'assets/images/sites/lspimg.jpg', 'https://lspimg.com/', '时尚与健康');

--
-- 转储表的索引
--

--
-- 表的索引 `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `kotoba`
--
ALTER TABLE `kotoba`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `rss_news`
--
ALTER TABLE `rss_news`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `site_list`
--
ALTER TABLE `site_list`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ads`
--
ALTER TABLE `ads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号';

--
-- 使用表AUTO_INCREMENT `kotoba`
--
ALTER TABLE `kotoba`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID', AUTO_INCREMENT=81;

--
-- 使用表AUTO_INCREMENT `rss_news`
--
ALTER TABLE `rss_news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号';

--
-- 使用表AUTO_INCREMENT `site_list`
--
ALTER TABLE `site_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
