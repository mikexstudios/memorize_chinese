-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2007 at 12:23 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `memorize_chinese`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `id` int(100) NOT NULL auto_increment,
  `deck_id` int(10) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(400) NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=446 ;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `deck_id`, `question`, `answer`, `extra`) VALUES
(1, 1, '结', 'jié', 'tie; 结果 jiéguǒ result; 结婚 marry  [jiē] bear fruit'),
(2, 1, '束', 'shù', 'bundle; 束缚 shùfù tie up; 结束 jiéshù finish'),
(3, 1, '注', 'zhù', 'pour; (F註) notes; 注意 zhùyì pay attention; 注视 gaze'),
(4, 1, '册', 'cè', 'book; 手册 shǒucè handbook; 地图册 dìtúcè atlas'),
(5, 1, '续', 'xù', '(继续 jìxù) continue; 连续 liánxù continuous'),
(6, 1, '祖', 'zǔ', '(祖先 zǔxiān) ancestor; 祖母 zǔmǔ grandmother'),
(7, 1, '籍', 'jí', 'book; registry; native place; membership; 国籍 nationality'),
(8, 1, '全', 'quán', 'whole, entire; 完全 completely; 安全 safety'),
(9, 1, '省', 'shěng', 'province; economize; omit  [xǐng] 反省 introspection'),
(10, 1, '处', 'chù', 'place  [chǔ] deal with'),
(11, 1, '适', 'shì', '合适 héshì suitable, appropriate   [dí]'),
(12, 1, '应', 'yīng', '(应该 yīnggāi) should  [yìng] 应用 apply'),
(13, 1, '靠', 'kào', 'lean on; rely on; keep close to; come up to; near'),
(14, 1, '波', 'bō', '(波浪 bōlàng) wave; 波长 wavelength'),
(15, 1, '士', 'shì', 'scholar; 博士 Ph.D; 女士 lady, Ms.; 战士 soldier'),
(16, 1, '顿', 'dùn', 'to pause; meal'),
(17, 1, '柯', 'kē', '(书) stalk, branch; (surname)'),
(18, 2, '屋', 'wū', '(屋子 wūzi) room; (房屋 fángwū) building; 屋顶 roof'),
(19, 2, '熟', 'shú', 'cooked, ripe, familiar; 熟悉 shúxī know well  [shóu]'),
(20, 2, '悉', 'xī', '熟悉 shúxī know well, be familiar with'),
(21, 2, '窗', 'chuāng', '(窗户 chuānghu, 窗口) window; 窗帘 curtain'),
(22, 2, '户', 'hù', 'door; household; 窗户 chuānghù window'),
(23, 2, '摆', 'bǎi', 'put, arrange; sway, wave; 摇摆舞 rock ''n'' roll'),
(24, 2, '被', 'bèi', 'quilt; by; (indicates passive voice)   [pī]'),
(25, 2, '毯', 'tǎn', '(毯子 tǎnzi) blanket; (地毯 dìtǎn) carpet, rug'),
(26, 2, '柜', 'guì', '(F櫃) (柜子) cabinet; 柜台 counter; 掌柜 shopkeeper  [jǔ]'),
(27, 2, '挂', 'guà', 'hang, put up'),
(28, 2, '调', 'diào', 'shift; tone  [tiáo] adjust'),
(29, 2, '栋', 'dòng', 'ridgepole, m. (for houses)'),
(30, 2, '设', 'shè', 'set up; 建设 construct; 设计 design; 设备 equipment'),
(31, 2, '备', 'bèi', '(准备) get ready, prepare; 设备 equipment'),
(32, 2, '旧', 'jiù', 'old (not new) (cf 老 old, not young; 新 new)'),
(33, 2, '厕', 'cè', '厕所 cèsuǒ toilet  [si] 茅厕 máosi latrine'),
(34, 2, '浴', 'yù', '沐浴 mùyù take a bath; 浴室 yùshì bath/shower room'),
(35, 2, '恐', 'kǒng', '(恐怕 kǒngpà) I''m afraid; 恐怖 kǒngbù terror'),
(36, 2, '楼', 'lóu', 'story, building; 大楼 mansion; 楼梯 lóutī stairs'),
(37, 2, '商', 'shāng', 'discuss; business'),
(38, 2, '品', 'pǐn', '(产品 chǎnpǐn) product; 商品 shāngpǐn merchandise'),
(39, 2, '具', 'jù', '工具 tool; 具有 possess; 具体 concrete; 玩具 toy'),
(40, 2, '层', 'céng', 'layer, level, storey'),
(41, 2, '烘', 'hōng', 'dry, toast; to warm; 热烘烘 very warm'),
(42, 2, '静', 'jìng', 'still, quiet; 静电 static electricity'),
(43, 2, '般', 'bān', 'sort, kind; 一般 yìbān ordinary  [pán] happy  [bō] 般若'),
(44, 2, '猜', 'cāi', 'guess; 猜想 cāixiǎng suppose'),
(45, 2, '胃', 'wèi', 'stomach; 胃口 wèikǒu appetite'),
(46, 2, '急', 'jí', 'urgent; 着急 zháojí anxious; 急忙 jímáng in a hurry'),
(47, 2, '约', 'yuē', 'approximately; arrange; appointment   [yāo] weigh'),
(48, 2, '翰', 'hàn', 'writing brush; writing'),
(49, 3, '接', 'jiē', 'connect; (接受) accept; 接着 catch; next; 直接 direct'),
(50, 3, '原', 'yuán', 'originally; 原来 it turns out; original; 原因 cause'),
(51, 3, '孩', 'hái', '(孩子 háizi, 小孩儿 xiǎoháir) child; 女孩儿 girl'),
(52, 3, '吸', 'xī', 'inhale; 呼吸 breathe; 吸收 absorb; 吸引 attract'),
(53, 3, '烟', 'yān', '(F煙) smoke; cigarette; mist  [yīn] (=氤)'),
(54, 3, '清', 'qīng', '(清楚 qīngchu) clear; 清洁 qīngjié clean'),
(55, 3, '蒸', 'zhēng', '(蒸汽 zhēngqì) steam'),
(56, 3, '味', 'wèi', '(味道 wèidao) flavor, taste'),
(57, 3, '芥', 'jiè', 'mustard; 芥子园画谱  [gài] 芥蓝 gàilán cabbage mustard'),
(58, 3, '兰', 'lán', '兰花 lánhuā orchid'),
(59, 3, '嫩', 'nèn', 'tender, delicate; light; inexperienced'),
(60, 3, '香', 'xiāng', 'perfume; fragrant; 香港 Xiānggǎng Hong Kong'),
(61, 3, '汤', 'tāng', 'hot water, soup  [shāng] 汤汤'),
(62, 3, '菠', 'bō', '菠菜 bōcài spinach; 菠萝 bōluó pineapple'),
(63, 3, '腐', 'fǔ', 'rotten; 豆腐 tofu; 腐蚀 corrode; 腐败 corrupt'),
(64, 3, '素', 'sù', 'plain, white; vegetarian; 因素 yīnsù factor, element'),
(65, 3, '鲜', 'xiān', 'fresh    [xiǎn] few, rare; 朝鲜 Korea'),
(66, 3, '麻', 'má', 'hemp; (芝麻 zhīma) sesame; 麻烦 máfan bother  [mā]'),
(67, 3, '烦', 'fán', 'be vexed; 麻烦 trouble, bother; 不耐烦 impatient'),
(68, 3, '板', 'bǎn', 'board; hard; (F闆) 老板 lǎobǎn shopkeeper'),
(69, 3, '盐', 'yán', 'salt'),
(70, 3, '精', 'jīng', 'perfect; 精神 spirit, essence; 酒精 alcohol'),
(71, 3, '章', 'zhāng', 'chapter; seal, stamp; medal, badge; rules'),
(72, 3, '卡', 'kǎ', 'block; calory  [qiǎ] checkpoint'),
(73, 3, '建', 'jiàn', 'construct; establish; 建议 jiànyì suggest'),
(74, 3, '康', 'kāng', '健康 jiànkāng health; 康熙字典 Kāngxī Zìdiǎn'),
(75, 3, '法', 'fǎ', '(法律 fǎlǜ) law; (办法 bànfǎ) method'),
(76, 3, '许', 'xǔ', 'allow; 许多 xǔduō a lot; 也许 yěxǔ perhaps  [hǔ]'),
(77, 3, '油', 'yóu', 'oil; 汽油 qìyóu gasoline; 酱油 jiàngyóu soy sauce [yōu]'),
(78, 3, '淡', 'dàn', 'thin, light; 淡蓝 ( = 浅蓝) light blue'),
(79, 3, '实', 'shí', 'true, real; 事实 fact; 实际上 actually; 实在 really'),
(80, 3, '梅', 'méi', 'plum, prune; 梅花 plum blossom; 梅林 plum grove'),
(81, 3, '陈', 'chén', 'display; explain; stale; (dynasty: 557-589)'),
(82, 4, '恤', 'xù', 'pity, sympathize; give relief'),
(83, 4, '裤', 'kù', '(裤子) pants'),
(84, 4, '等', 'děng', 'equal; class; wait; et cetera (etc.)'),
(85, 4, '无', 'wú', 'without; nothingness  [mó] 南无'),
(86, 4, '论', 'lùn', 'theory   [Lún] 论语 Lúnyǔ Analects of Confucius'),
(87, 4, '牌', 'pái', 'tablet; brand; cards; dominoes: 牌子 sign'),
(88, 4, '需', 'xū', '(需要 xūyào) need; ; 必需 bìxū essential'),
(89, 4, '粉', 'fěn', 'powder; 洗衣粉 laundry detergent; 粉红色 pink'),
(90, 4, '膏', 'gāo', '牙膏 yágāo toothpaste; 油膏 ointment  [gào] lubricate'),
(91, 4, '皂', 'zào', '肥皂 féizào soap'),
(92, 4, '卫', 'wèi', '保卫 defend; 卫生 sanitary; 卫星 satellite'),
(93, 4, '巾', 'jīn', 'piece of cloth; 毛巾 towel; 餐巾 napkin; 围巾 scarf'),
(94, 4, '于', 'yú', '(surname); (F於) in, at, to, from, by, than'),
(95, 4, '化', 'huà', '(变化 biànhuà) change  [huā] (=花) spend'),
(96, 4, '妆', 'zhuāng', 'adorn oneself; 妆奁 bride''s trousseau'),
(97, 4, '购', 'gòu', '(购买 gòumǎi) purchase'),
(98, 4, '物', 'wù', 'thing; 动物 animal; 植物 plant; 物理 physics'),
(99, 4, '套', 'tào', 'set; cover; 手套 glove; 一套衣服 a suit'),
(100, 4, '短', 'duǎn', 'short (opposite of 长 cháng)'),
(101, 4, '厚', 'hòu', 'thick; deep; kind; rich (food)   (cf 薄 báo thin)'),
(102, 4, '薄', 'báo', 'thin  [bó] slight; 薄弱 weak  [bò] 薄荷 peppermint'),
(103, 4, '减', 'jiǎn', 'subtract; 减少 jiǎnshǎo decrease'),
(104, 4, '价', 'jià', '(F價) (价值) value; (价钱) price  [jie] (F價)  [jiè] servant'),
(105, 4, '折', 'zhé', 'fold; break; change direction [shé] break [zhē] turn over'),
(106, 4, '纯', 'chún', '(纯洁 chúnjié) pure; (单纯 dānchún) simple'),
(107, 4, '棉', 'mián', 'cotton'),
(108, 4, '哎', 'āi', '(interjection:) hey; 哎呀 āiyā; 哎哟 āiyō  [ēi]'),
(109, 4, '质', 'zhì', '(物质 wùzhì) matter, substance; 质量 zhìliàng quality; mass'),
(110, 4, '量', 'liàng', 'amount; 量词 classifier  [liáng] measure'),
(111, 4, '挑', 'tiāo', '(挑选) choose  [tiǎo] poke; 挑战 challenge  [tāo]'),
(112, 4, '剔', 'tī', 'pick, scrape meat from a bone with a knife'),
(113, 4, '非', 'fēi', 'not, non-; 非常 fēicháng unusually'),
(114, 4, '标', 'biāo', 'mark; 标准 biāozhǔn standard'),
(115, 4, '准', 'zhǔn', 'allow; (F準) certainly; precise; 准备 prepare; 标准 standard'),
(116, 4, '廉', 'lián', 'honest, clean; low-priced'),
(117, 4, '乎', 'hū', '似乎 sìhu it seems; 几乎 jīhū almost'),
(118, 4, '争', 'zhēng', 'contend; dispute; 战争 zhànzhēng war; 斗争 struggle'),
(119, 4, '陪', 'péi', '(陪同 péitóng) accompany; 陪嫁 péijià dowry'),
(120, 4, '金', 'jīn', '(金子 jīnzi) gold (Au); (金属 jīnshǔ) metal'),
(121, 4, '税', 'shuì', 'tax'),
(122, 4, '州', 'zhōu', 'prefecture; 广州 Guǎngzhōu Canton'),
(123, 4, '签', 'qiān', '签订 conclude & sign (treaty, etc); 签名 signature'),
(124, 4, '收', 'shōu', 'gather; 收拾 put in order; 收获 harvest; 收音机 radio'),
(125, 4, '据', 'jù', 'seize; depend on; (根据 gēnjù) according to  [jū] 拮据'),
(126, 4, '迪', 'dí', '(书) enlighten, guide'),
(127, 4, '达', 'dá', 'reach, arrive    [dā] [tà]'),
(128, 4, '斯', 'sī', '(thus; now used mostly for sound:) 法西斯 Fascist'),
(129, 5, '选', 'xuǎn', '(选择 xuǎnzé) choose, select; 选举 xuǎnjǔ election'),
(130, 5, '专', 'zhuān', '(专门) special; (专家) expert; 专政 dictatorship'),
(131, 5, '业', 'yè', '商业 commerce; 工业 industry; 作业 homework'),
(132, 5, '亚', 'yà', 'inferior, second; 亚洲 Yàzhōu Asia'),
(133, 5, '史', 'shǐ', '(历史 lìshǐ) history; (surname)'),
(134, 5, '统', 'tǒng', '系统 system; 统治 dominate; 统一 unify'),
(135, 5, '计', 'jì', '(计算) count, calculate; 统计 statistics'),
(136, 5, '受', 'shòu', 'receive; 接受 jiēshòu accept; 难受 nánshòu unhappy'),
(137, 5, '反', 'fǎn', 'turn over; (反对 fǎnduì) oppose; 反映 fǎnyìng reflect  [bǎn] 反反 proper'),
(138, 5, '复', 'fù', '(F復) ; 恢复 recover; (F複) 复杂 complex; (F覆) cover'),
(139, 5, '指', 'zhǐ', 'finger; point; 指头 zhǐtou finger; 指甲 zhǐjia nail'),
(140, 5, '导', 'dǎo', 'lead; 领导 lǐngdǎo leader'),
(141, 5, '授', 'shòu', 'award, give; teach; 教授 jiàoshòu professor'),
(142, 5, '讨', 'tǎo', '(讨论 tǎolùn) discuss; 讨厌 tǎoyàn digusting'),
(143, 5, '聊', 'liáo', 'just; slightly; 无聊 wúliáo bored; silly; 聊天儿 chat'),
(144, 5, '肯', 'kěn', 'be willing to; consent; 肯定 kěndìng definitely'),
(145, 5, '定', 'dìng', 'fix; 一定 yídìng definite; 决定 juédìng decide'),
(146, 5, '至', 'zhì', 'to, until; 甚至 shènzhì even; 至少 zhìshǎo at least'),
(147, 5, '毕', 'bì', '毕业 bìyè graduate; 毕竟 bìjìng after all'),
(148, 5, '系', 'xì', 'n. ①system; series; family ②department (in a college); faculty'),
(149, 5, '算', 'suàn', '(计算 jìsuàn) compute; 算了 forget it, never mind'),
(150, 5, '研', 'yán', 'grind; (研究 yánjiū) study'),
(151, 5, '究', 'jiū', '研究 yánjiū study, research; 究竟 after all'),
(152, 5, '院', 'yuàn', 'courtyard; 学院 college; 医院 hospital; 法院 court'),
(153, 5, '管', 'guǎn', 'tube; (管理 guǎnlǐ) manage; 不管 bùguǎn no matter'),
(154, 5, '科', 'kē', 'department; 科学 kēxué science; 外科 wàikē surgery'),
(155, 5, '赚', 'zhuàn', 'gain, profit    [zuàn] cheat'),
(156, 5, '兼', 'jiān', 'double; simultaneously: 兼容 compatible'),
(157, 5, '愿', 'yuàn', 'wish'),
(158, 5, '当', 'dāng', '(F當) serve as; (F噹) ding-dong  [dàng] (F當) (当作) regard as  [dǎng] (F當)'),
(159, 5, '整', 'zhěng', '(整个) whole; 调整 tiáozhěng adjust; 整齐 zhěngqí neat'),
(160, 5, '病', 'bìng', 'sick; 毛病 máobing malfunction'),
(161, 5, '交', 'jiāo', 'join; 交通 jiāotōng traffic; 交换 jiāohuàn exchange'),
(162, 5, '唉', 'ài', '(interj.) oh!  [āi] yes?'),
(163, 5, '哲', 'zhé', '哲学 zhéxué philosophy'),
(164, 5, '申', 'shēn', 'explain; 9th 地支 Earthly Branch'),
(165, 5, '虑', 'lǜ', '(考虑 kǎolǜ) consider; 忧虑 yōulǜ worry about'),
(166, 5, '验', 'yàn', '(经验 jīngyàn) experience'),
(167, 5, '履', 'lǚ', 'shoes;  Treading'),
(168, 5, '历', 'lì', '(F歷) 历史 lìshǐ history; 经历 experience; (F曆) 日历'),
(169, 5, '咱', 'zán', '(咱们 zánmen) we     [zan] (from 早晚 zǎowǎn)'),
(170, 5, '议', 'yì', '(议论 yìlùn) discuss; 会议 conference; 建议 suggest'),
(171, 6, '梯', 'tī', '(梯子 tīzi) ladder; (楼梯 lóutī) stairs'),
(172, 6, '廊', 'láng', 'hall'),
(173, 6, '声', 'shēng', '(声音 shēngyīn) sound'),
(174, 6, '招', 'zhāo', 'beckon; recruit; attract; 招待 entertain (guests)'),
(175, 6, '笑', 'xiào', 'laugh'),
(176, 6, '隔', 'gé', 'separate, stand between; 隔壁 next door'),
(177, 6, '壁', 'bì', 'wall, cliff; 墙壁 qiángbì wall (la pared)'),
(178, 6, '赛', 'sài', 'contest; 比赛 match, race'),
(179, 6, '激', 'jī', 'surge, dash; (激动 jīdòng) excite; 激烈 jīliè intense'),
(180, 6, '喊', 'hǎn', '(喊叫,呼喊,叫喊) shout, cry out'),
(181, 6, '响', 'xiǎng', 'sound; 影响 yǐngxiǎng influence'),
(182, 6, '赶', 'gǎn', 'catch up'),
(183, 6, '紧', 'jǐn', 'tight; 紧张 jǐnzhāng tense; 要紧 yàojǐn important'),
(184, 6, '翻', 'fān', 'turn over; 翻译 fānyì translate'),
(185, 6, '栏', 'lán', 'fence, railing'),
(186, 6, '稍', 'shāo', '(稍稍, 稍微) a little, a bit, slightly  [shào] 稍息'),
(187, 6, '微', 'wēi', 'tiny, micro; 微笑 wēixiào smile'),
(188, 6, '试', 'shì', 'try; test; 考试 kǎoshì test, quiz'),
(189, 6, '街', 'jiē', 'street; 街道 street, neighborhood; 街头 street-corner'),
(190, 6, '育', 'yù', 'raise, educate; 教育 education   [yō] 杭育 heave-ho'),
(191, 6, '迷', 'mí', 'be lost; 我迷了路 I am lost; 迷信 superstition'),
(192, 6, '瞒', 'mán', 'hide the truth from'),
(193, 6, '厅', 'tīng', 'hall; 餐厅 cāntīng dining room'),
(194, 6, '厨', 'chú', '厨房 chúfáng kitchen'),
(195, 6, '环', 'huán', 'ring; 环境 huánjìng environment, surroundings'),
(196, 6, '境', 'jìng', 'border, territory; 环境 huánjìng environment'),
(197, 6, '嗯', 'ń', '[ň] [ǹ] [ńg] [ňg] [ǹg] (a non-verbal exclamation)'),
(198, 6, '通', 'tōng', '(通过) go through; 交通 traffic  [tòng] (measure word)'),
(199, 6, '德', 'dé', 'virtue; 道德 dàodé ethics; 德国 Germany (Deutchland)'),
(200, 6, '森', 'sēn', '森林 sēnlín forest'),
(393, 7, '醉', 'zuì', 'drunk'),
(392, 7, '噢', 'ō', 'Oh (interjection)'),
(391, 7, '景', 'jǐng', 'scene, scenery'),
(390, 7, '背', 'bèi', 'back  [bēi] carry on the back'),
(389, 7, '相', 'xiāng', 'each other, mutual  [xiàng] look at; appearance; photo'),
(388, 7, '往', 'wǎng', 'to, toward; 往往 wǎngwǎng often'),
(386, 7, '摇', 'yáo', 'shake'),
(387, 7, '滚', 'gǔn', 'roll; boil'),
(385, 7, '典', 'diǎn', '典型 diǎnxíng typical; 古典 classical; 词典 dictionary'),
(384, 7, '古', 'gǔ', '(古代 gǔdài) ancient'),
(383, 7, '戏', 'xì', '(戏剧 xìjù) drama, play; 游戏 yóuxì game'),
(382, 7, '趣', 'qù', 'interest, fun; 兴趣 interest; 趣味 interest; taste'),
(381, 7, '躁', 'zào', 'rash, impetuous'),
(380, 7, '急', 'jí', 'urgent; 着急 zháojí anxious; 急忙 jímáng in a hurry'),
(379, 7, '脾', 'pí', 'spleen; 脾气 píqi (bad-) temper'),
(378, 7, '朗', 'lǎng', '爽朗 shuǎnglǎng, 明朗 bright & clear; 朗讼 recite'),
(370, 7, '事', 'shì', 'thing, event; 事情 shìqing situation'),
(371, 7, '闹', 'nào', '(热闹) noisy; 闹钟 alarm clock'),
(372, 7, '翻', 'fān', 'turn over; 翻译 fānyì translate'),
(373, 7, '详', 'xiáng', '详细 detailed; 端详 details; 安详 serene'),
(374, 7, '细', 'xì', 'thin; 仔细 zǐxì careful; 细胞 xìbāo cell; 详细 detailed'),
(375, 7, '况', 'kuàng', '情况 circumstances; 况且 moreover'),
(376, 7, '性', 'xìng', 'sex; nature; -ness'),
(377, 7, '格', 'gé', 'check, pattern, standard; 格外 géwài especially  [gē]'),
(402, 7, '假', 'jiǎ', 'false  [jià] (假期 jiàqī) vacation'),
(403, 7, '憋', 'biē', 'check, restrain, suppress; suffocate, feel depressed'),
(401, 7, '悔', 'huǐ', '(后悔 hòuhuǐ) regret, repent'),
(399, 7, '怪', 'guài', 'blame; (奇怪 qíguài) strange; 怪物 guàiwu monster'),
(400, 7, '挺', 'tǐng', 'quite, very; endure, stand; 挺立 stand upright'),
(397, 7, '破', 'pò', 'smash; 破坏 pòhuài ruin; 破烂 pòlàn worn out'),
(398, 7, '吹', 'chuī', 'blow'),
(396, 7, '镜', 'jìng', '(镜子) mirror; lens; 眼镜 yǎnjìng glasses'),
(395, 7, '害', 'hài', 'harmful; 害虫 hàichóng destructive insect; 厉害 lìhai fierce'),
(369, 8, '敢', 'gǎn', 'dare; 勇敢 yǒnggǎn brave'),
(394, 7, '厉', 'lì', '厉害 terrible; formidable  [lài] (name of ancient country)'),
(368, 8, '炸', 'zhà', '(爆炸 bàozhà) explode, blow up  [zhá] deep fry'),
(367, 8, '胁', 'xié', 'upper part of side of person''s body; coerce'),
(366, 8, '威', 'wēi', '威胁 wēixié threaten, imperil; 示威 demonstrate'),
(365, 8, '盾', 'dùn', 'shield; 矛盾 máodùn contradiction ("spear-shield")'),
(364, 8, '矛', 'máo', 'spear; 矛盾 máodùn contradiction ("spear-shield")'),
(363, 8, '任', 'rèn', 'appoint; no matter; 任务 task; 任何 any  [Rén] (surname)'),
(362, 8, '责', 'zé', 'duty; 责任 zérèn responsibility'),
(361, 8, '负', 'fù', 'carry on shoulder; suffer; negative'),
(360, 8, '借', 'jiè', 'borrow, lend'),
(359, 8, '枪', 'qiāng', 'gun   [chēng] 欃枪 chánchēng comet'),
(358, 8, '向', 'xiàng', 'towards (direction); (F曏) formerly'),
(357, 8, '免', 'miǎn', 'exempt; 避免 bìmiǎn avoid; 免费 miǎnfèi free'),
(356, 8, '怪', 'guài', 'blame; (奇怪 qíguài) strange; 怪物 guàiwu monster'),
(355, 8, '糟', 'zāo', 'rotten; 糟糕 zāogāo bad luck! 糟踏 zāota waste, spoil'),
(354, 8, '乱', 'luàn', 'chaotic, disorderly, messy; 混乱 hùnluàn chaos'),
(353, 8, '死', 'sǐ', 'die, death'),
(352, 8, '烧', 'shāo', 'roast, cook; burn (cf 炒 chǎo stir-fry)'),
(351, 8, '灾', 'zāi', '(灾难 zāinàn, 灾害 zāihài) disaster'),
(350, 8, '柴', 'chái', 'firewood; 火柴 huǒchái match; 柴油 cháiyóu diesel oil'),
(349, 8, '模', 'mó', '模范 model; 模仿 imitate  [mú] 模样 appearance; 模子'),
(348, 8, '据', 'jù', 'seize; depend on; (根据 gēnjù) according to  [jū] 拮据'),
(347, 8, '引', 'yǐn', 'draw, stretch; (引起 yǐnqǐ) cause; (吸引 xīyǐn) attract'),
(346, 8, '童', 'tóng', '儿童 értóng children'),
(345, 8, '通', 'tōng', '(通过) go through; 交通 traffic  [tòng] (measure word)'),
(344, 8, '闻', 'wén', 'smell; hear; 新闻 news'),
(343, 8, '频', 'pín', '频率 pínlǜ frequency'),
(342, 8, '闲', 'xián', 'idle; free time; 闲话 digression; complaint'),
(341, 8, '录', 'lù', 'record; 记录 jìlù take notes; 录音机 tape recorder'),
(340, 8, '纪', 'jì', '世纪 century; 纪念 memento; 纪律 discipline'),
(339, 8, '尔', 'ěr', '(archaic:) you; 尔后 thereafter; 高尔夫 golf'),
(338, 8, '偶', 'ǒu', '(偶然 ǒurán) by chance; even number (cf. 奇 jī odd)'),
(337, 8, '术', 'shù', 'skill; (艺术 yìshù) art; 技术 technique  [zhú]'),
(336, 8, '艺', 'yì', 'skill; (艺术 yìshù) art; 文艺 literature and art'),
(335, 8, '堂', 'táng', 'hall; 食堂 dining hall; 课堂 classroom  [tāng] 亮堂堂'),
(334, 8, '商', 'shāng', 'discuss; business (store)'),
(333, 8, '演', 'yǎn', '(表演 biǎoyǎn) perform, act, performance'),
(332, 8, '响', 'xiǎng', 'sound; 影响 yǐngxiǎng influence'),
(404, 7, '死', 'sǐ', 'die, death'),
(405, 7, '演', 'yǎn', '(表演 biǎoyǎn) perform, act, performance'),
(406, 7, '部', 'bù', '(部分 bùfen) part; 西部 western part; 全部 entire'),
(407, 7, '谈', 'tán', 'talk'),
(408, 7, '华', 'huá', 'magnificent; China    [Huà] (surname); 华山'),
(409, 7, '姆', 'mǔ', 'nurse; 汤姆 Tāngmǔ Tom'),
(410, 7, '丽', 'lì', '美丽 beautiful; 壮丽 majestic  [Lí] Korea'),
(411, 7, '莎', 'shā', '(used in names)  [suō] 莎草 (a kind of plant)'),
(412, 9, '代', 'dài', '(代表 dàibiǎo) represent; (时代 shídài) generation'),
(413, 9, '移', 'yí', '(移动) move; 转移 shift; transform; 移植 transplant'),
(414, 9, '曾', 'céng', '(曾经 céngjīng) in the past  [zēng] great- (grandmother)'),
(415, 9, '陆', 'lù', 'land; 大陆 continent   [liù] six ( = 六)'),
(416, 9, '确', 'què', 'true; 正确 correct; 确实 indeed; 明确 explicit'),
(417, 9, '否', 'fǒu', 'no; 是否 whether   [pǐ]  Standstill'),
(418, 9, '则', 'zé', '(conjunction); 原则 yuánzé principle; 否则 fǒuzé or else'),
(419, 9, '散', 'sàn', 'break up; distribute; dispel  [sǎn] fall apart; scattered'),
(420, 9, '步', 'bù', 'step; 进步 jìnbù progress; 散步 sànbù go for a walk'),
(421, 9, '岸', 'àn', 'shore'),
(422, 9, '腻', 'nì', 'greasy, oily; smooth; (腻烦 nìfan) disgusted, fed up'),
(423, 9, '炉', 'lú', '(炉子 lúzi) stove, oven, furnace'),
(424, 9, '姑', 'gū', '姑娘 aunt'),
(425, 9, '既', 'jì', 'since; already; 既然 jìrán since, now that'),
(426, 9, '趟', 'tàng', '(measure word) trip; row  [tāng] ( = 蹚)'),
(427, 9, '社', 'shè', '(社会 shèhuì) society'),
(428, 9, '订', 'dìng', 'conclude (cf 定)'),
(429, 9, '线', 'xiàn', 'line, thread; 光线 light ray; 电线 wire'),
(430, 9, '量', 'liàng', 'amount; 量词 classifier  [liáng] measure'),
(431, 9, '顺', 'shùn', 'along, in the same direction as; obey; suitable'),
(432, 9, '待', 'dài', 'treat; entertain; wait for   [dāi] (=呆) stay'),
(433, 9, '局', 'jú', 'department; situation; 邮局 yóujú post office'),
(434, 9, '护', 'hù', '(保护 bǎohù) guard, protect; 护士 hùshi nurse'),
(435, 9, '拜', 'bài', 'honor, worship; 礼拜 lǐbài week   [bái] 拜拜 bye-bye'),
(436, 9, '签', 'qiān', '签订 conclude & sign (treaty, etc); 签名 signature'),
(437, 9, '证', 'zhèng', 'prove; 图书证 library card'),
(438, 9, '领', 'lǐng', 'to lead; collar; 领导, 领袖 leader; 本领 ability'),
(439, 9, '址', 'zhǐ', '地址 dìzhǐ address'),
(440, 9, '墨', 'mò', '(墨水 mòshuǐ) ink; 墨子 Mòzǐ (a philosopher)'),
(441, 9, '港', 'gǎng', 'harbor; 香港 Xiānggǎng Hong Kong'),
(442, 9, '韩', 'Hán', '(surname); (old name for Korea)'),
(443, 9, '斯', 'sī', '(thus; now used mostly for sound:) 法西斯 Fascist'),
(444, 9, '蒂', 'dì', 'base of a fruit; 烟蒂 cigarette butt'),
(445, 9, '夫', 'fū', 'man; 丈夫 husband; 工夫 skill; 大夫 dàifu doctor  [fú]');

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

DROP TABLE IF EXISTS `decks`;
CREATE TABLE `decks` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `decks`
--

INSERT INTO `decks` (`id`, `name`) VALUES
(1, 'Lesson 1'),
(2, 'Lesson 2'),
(3, 'Lesson 3'),
(4, 'Lesson 4'),
(5, 'Lesson 5'),
(6, 'Lesson 6'),
(7, 'Lesson 7'),
(8, 'Lesson 8'),
(9, 'Lesson 9');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) collate latin1_general_ci NOT NULL default '0',
  `session_start` int(10) unsigned NOT NULL default '0',
  `session_last_activity` int(10) unsigned NOT NULL default '0',
  `session_ip_address` varchar(16) collate latin1_general_ci NOT NULL default '0',
  `session_user_agent` varchar(50) collate latin1_general_ci NOT NULL,
  `session_data` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_start`, `session_last_activity`, `session_ip_address`, `session_user_agent`, `session_data`) VALUES
('33468e8edf53bdbb3eb317738bb9fdb2', 1197152246, 1197188481, '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 'a:4:{s:21:"current_answer_rating";i:0;s:11:"card_number";i:17;s:10:"learn_deck";i:7;s:7:"flipped";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `attribute` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

DROP TABLE IF EXISTS `user_progress`;
CREATE TABLE `user_progress` (
  `id` int(100) NOT NULL auto_increment,
  `card_id` int(100) NOT NULL,
  `flipped` tinyint(1) NOT NULL default '0',
  `answer_rating` float NOT NULL default '0',
  `next_repetition_date` int(10) NOT NULL,
  `interval` int(10) NOT NULL default '0',
  `repetitions_to_memorize` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_progress`
--

