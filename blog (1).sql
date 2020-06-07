-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020-06-07 04:14:57
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- 表的结构 `blog_article`
--

CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `art_author` varchar(50) DEFAULT NULL COMMENT '文章作者',
  `art_keywords` varchar(50) DEFAULT NULL COMMENT '文章关键词',
  `art_views` int(11) NOT NULL DEFAULT '0' COMMENT '文章查看次数',
  `art_content` text COMMENT '文章内容',
  `art_description` varchar(100) DEFAULT NULL COMMENT '文章缩略图右边的描述',
  `art_time` datetime DEFAULT NULL COMMENT '发表文章时间',
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章类型',
  `art_photo` varchar(100) DEFAULT NULL COMMENT '文章缩略图'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`art_id`, `art_title`, `art_author`, `art_keywords`, `art_views`, `art_content`, `art_description`, `art_time`, `cate_id`, `art_photo`) VALUES
(5, '第一线新闻', '车车', '黑人弗洛伊德死于心肺骤停', 0, '<p>阿深V爱上过发电工官方发布黑人弗洛伊德最终尸检报告：死于心肺骤停官方发布黑人弗洛伊德最终尸检报告：死于心肺骤停官方发布黑人弗洛伊德最终尸检报告：死于心肺骤停官方发布黑人弗洛伊德最终尸检报告：死于心肺骤停</p>', '官方发布黑人弗洛伊德最终尸检报告：死于心肺骤停', '2020-06-04 11:59:55', 2, 'uploads/20200604115244830.jpg'),
(12, '耿爽离任外交部发言人', '靓仔', '外交部', 0, '<p><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">6月5日，耿爽作为发言人最后一次主持外交部例行记者会，他同时宣布，将不再担任外交部新闻司副司长、发言人。耿爽出生于1973年，此前曾在中国驻联合国代表团工作、担任中国驻美国使馆发言人等，是一名资深的外交官。不舍，祝福！</span></p><p><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);"><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">6月5日，耿爽作为发言人最后一次主持外交部例行记者会，他同时宣布，将不再担任外交部新闻司副司长、发言人。耿爽出生于1973年，此前曾在中国驻联合国代表团工作、担任中国驻美国使馆发言人等，是一名资深的外交官。不舍，祝福！</span></span></p>', '耿爽作为发言人最后一次主持外交部例行记者会，他同时宣布，将不再担任外交部新闻司副司长、发言人。', '2020-06-05 17:04:53', 1, 'uploads/20200605170417484.jpg'),
(7, '中国民航局调整国际客运航班数量', '车车', '民航局', 0, '<p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p"><span class="bjh-strong" style="font-size: 18px; font-weight: 700;">各运输航空公司:</span></span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">为继续做好疫情防控工作,同时便利国际人员往来,根据国务院联防联控机制要求,依据《中华人民共和国国境卫生检疫法》《中华人民共和国突发事件应对法》和《中华人民共和国民用航空法》等有关规定,现对国际客运航班数量进行调整,具体安排通知如下:</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">一、已列入民航局3月12日官网发布的“国际航班信息发布(第5期)”(以下简称“第5期”)航班计划的中外航空公司可以上述航班计划为基准,继续按照以下原则执行自/至中国的国际客运航班:国内每家航空公司经营至任一国家的航线只能保留1条,每条航线每周运营班次不得超过1班;外国每家航空公司经营至我国的航线只能保留1条,每周运营班次不得超过1班。上述航线航班可在本公司经营许可范围内调整境内外航点。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">二、自2020年6月8日起,所有未列入“第5期”航班计划的外国航空公司,可在本公司经营许可范围内,选择1个具备接收能力的口岸城市(具体城市名单可在民航局官网查询),每周运营1班国际客运航线航班。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">三、各航空公司由于受疫情影响调减航班涉及的航线经营许可和起降时刻继续予以保留。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">四、请各航空公司根据上述要求,向民航局运行监控中心申请运行至2020年10月24日的航班预先飞行计划。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">五、各航空公司应按照民航局发布的《运输航空公司疫情防控技术指南》要求做好各项防控措施,落实民航局、海关总署联合发布的《关于中国籍旅客乘坐航班回国前填报防疫健康信息的公告》要求。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">六、为防止航班入境地点过于集中,确保口岸城市具备相应的国际航班和旅客接收的综合保障能力,各航空公司在安排新增航线航班前,应取得由口岸机场所在地省级联防联控机制办公室或应对疫情工作领导小组办公室出具的《疫情防控保障能力确认函》。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">七、自2020年6月8日起,实施航班奖励和熔断措施。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">1.民航局、外交部、国家卫健委、海关总署、移民局等共同建立专班机制,以入境航班落地后旅客核酸检测结果为依据,对航班实施熔断和奖励措施。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">2.奖励措施。航空公司同一航线航班,入境后核酸检测结果为阳性的旅客人数连续3周为零的,可在航线经营许可规定的航班量范围内增加每周1班,最多达到每周2班。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">3.熔断措施。航空公司同一航线航班,入境后核酸检测结果为阳性的旅客人数达到5个的,暂停该公司该航线运行1周;达到10个的,暂停该公司该航线运行4周。“熔断”的航班量不得调整用于其他航线。“熔断”期结束后,航空公司方可恢复每周1班航班计划。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">八、在风险可控并具备接收保障能力的前提下,可适度增加部分具备条件国家的航班增幅。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">九、本通知自发布之日起生效,民航局2020年3月26日发布的《关于疫情防控期间继续调减国际客运航班量的通知》(民航发〔2020〕12号)同时失效。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">民航局</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">2020年6月4日</span></p><p><br/></p>', '民航局关于调整国际客运航班的通知', '2020-06-04 12:14:03', 1, 'uploads/20200604121329974.jpg'),
(8, '31省区市新增新冠肺炎1例广东新增1例境外输入病例', '车车', '新增新冠肺炎', 51, '<p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">当日新增治愈出院病例5例，解除医学观察的密切接触者383人，重症病例与前一日持平。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">境外输入现有确诊病例60例（无重症病例），现有疑似病例3例。累计确诊病例1763例，累计治愈出院病例1703例，无死亡病例。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">截至6月3日24时，据31个省（自治区、直辖市）和新疆生产建设兵团报告，现有确诊病例69例（其中重症病例2例），累计治愈出院病例78319例，累计死亡病例4634例，累计报告确诊病例83022例，现有疑似病例3例。累计追踪到密切接触者746084人，尚在医学观察的密切接触者4360人。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">31个省（自治区、直辖市）和新疆生产建设兵团报告新增无症状感染者4例（均为境外输入）；当日无转为确诊病例；当日解除医学观察35例（境外输入1例）；尚在医学观察无症状感染者326例（境外输入43例）。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">累计收到港澳台地区通报确诊病例1581例。其中，香港特别行政区1093例（出院1039例，死亡4例），澳门特别行政区45例（出院45例），台湾地区443例（出院428例，死亡7例）。</span></p><p><span class="bjh-p"><br/></span></p><p><br/></p>', '【#31省区市新增新冠肺炎1例##广东新增1例境外输入病例#】6月3日0—24时，31个省（自治区、直辖市）和新疆生产建设兵团报告新增确诊病例1例，为境外输入病例（在广东）；无新增死亡病例；无新增疑似', '2020-06-04 12:14:59', 1, 'uploads/20200604121425565.jpg'),
(9, '美加州发生5.5级地震 研究曾称当地断层或可产生大震', '车车', '地震', 67, '<p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">目前尚无地震造成人员伤亡或财产损失的报告。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">另据报道，距离此次地震震中200公里的范围内，有四座大中型城市，其中距离最近的是贝克斯菲尔德。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">2019年，加州理工学院的科学家在《科学》杂志上发表一项研究成果称，观测到美国加州加洛克(Garlock)断层可产生8.0级地震，原因是同年的里奇克莱斯特(Ridgecrest)地震，破坏了附近断层的稳定性。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">同年10月，加州发布了一款地震预警应用程序，并鼓励所有居民下载它作为预防措施。“全州都有地震风险，”该应用程序网站的页面上写道。“如果地震级别足够大，能量传播的范围将远远超出大多数人的想象。”</span></p><p><br/></p>', '中新网电 据美国地质勘探局网站消息，北京时间4日9时32分，美国加利福尼亚州莫哈韦沙漠地区发生5.5级地震，震源深度6.8千米。', '2020-06-04 12:15:51', 2, 'uploads/20200607121348331.jpg'),
(10, '李谷一二婚丈夫去世！夫妻相伴几十年，给唯一女儿取名有深意', '车车', '二婚', 5, '<p><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">一开始很多人都误会，以为是李谷一老师病重，付笛声还专门在评论区解释，称“肖先生是李谷一老师的爱人”，解除了网友的疑惑，也证实了李谷一老师爱人去世的消息。</span></p><p style="margin-top: 26px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">据悉，肖卓能是李谷一的第二任丈夫。李谷一在肖卓能之前，还和恩师金铁霖有一段婚姻，那时候李谷一还没有成名，和老师日久生情，就成功领证。可惜后来随着李谷一名气的增长，两人之间的隔阂越来越深，就悄悄离了婚。加上两人婚后没有生子女，他们离婚也比较洒脱，现在金铁霖也有了第二段婚姻，依旧是自己的学生，婚后生活也很幸福，还有了一个儿子。</span></p><p><span class="bjh-p"><br/></span></p><p><br/></p>', '6月3日，付笛声在社交平台上晒出一张照片，发文：陪伴恩师李谷一再送肖伯伯一程。曝光了李谷一丈夫肖卓能去世的消息。', '2020-06-04 12:17:01', 2, 'uploads/20200604121634809.jpg'),
(11, '钟美美模仿志愿者上热搜 黑龙江鹤岗“钟美美”视频下架什么原因', '车车', '模仿', 1, '<p style="margin-top: 0px; margin-bottom: 29px; padding: 0px; overflow: hidden; line-height: 28px; font-family: 宋体; white-space: normal;">值得注意的是，昨天红星<a href="http://www.mnw.cn/news/" target="_blank" style="text-decoration-line: none; color: rgb(128, 0, 128);">新闻报道</a>，黑龙江农垦宝泉岭管理局教育局称，学校与“钟美美”有接触，是希望引导孩子拍一些正能量的作品。鹤岗市教育局一位工作人员告诉记者，教育系统不存在约谈，删视频是家长和小孩觉得不太好，自行删除的。</p><p style="margin-top: 0px; margin-bottom: 29px; padding: 0px; overflow: hidden; line-height: 28px; font-family: 宋体; white-space: normal;">　　另外，5月29日，“钟美美”曾发视频表示：“我不想发那些了，我想换个风格，也是表演，但是不模仿老师了，我看他们挺多看腻了。”</p><p style="margin-top: 0px; margin-bottom: 29px; padding: 0px; overflow: hidden; line-height: 28px; font-family: 宋体; white-space: normal;">　　网友评论</p><p style="margin-top: 0px; margin-bottom: 29px; padding: 0px; overflow: hidden; line-height: 28px; font-family: 宋体; white-space: normal;">　　有网友表示还是很像班主任。</p><p><br/></p>', '近日，黑龙江鹤岗男孩“钟美美”因模仿老师走红网络，但随后，其关于老师的视频都被删除。如果你关注钟美美在各个短视频平台的账号就会发现，他没有退网，但转变了模仿主题。', '2020-06-04 12:17:59', 2, 'uploads/20200604121739146.jpg'),
(13, '世邦魏理仕报告', '靓仔', '报告', 23, '<p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">CBRE世邦魏理仕近日发布的《2020全球生活报告》显示，2019年全球住宅价格最高的十大城市中有一半位于亚洲，香港仍是全球房价最贵城市。上海、深圳和北京的住宅套均价格再次跻身全球前十，分列第四、第五和第六位。纽约和里斯本分别占据住宅租金和租金涨幅榜的榜首。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">今年是世邦魏理仕连续第六年发布《全球生活報告》，对全球39个重点城市2019年的住宅市场数据与发展趋势进行综合对比与解读。调研结果显示，39个市场中有31个录得住宅价格上升，但平均涨幅只约为上一年水平的一半。报告指出，价格增速的普遍放缓也在一定程度上反映出各类降温措施实施后楼市逐步趋稳，房价过快上涨势头得到有效抑制。</span></p><p><span class="bjh-p"><br/></span></p><p><br/></p>', '上海、深圳及北京住宅套均价格再次跻身全球前十', '2020-06-05 17:06:06', 3, 'uploads/20200605170549534.jpg'),
(14, '微信团队', '靓仔', '微信', 1, '<p><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">据腾讯微信团队消息，安卓最新版微信已支持改微信号，入口在我&gt;个人信息&gt;微信号，用户可以一年修改一次微信号，如果用户最近一年有自定义过微信号，期满一年后也可以更改，iOS用户亦即将可以使用该功能。如果暂时还改不了，请大家稍等再试试。</span></p><p><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);"><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">据腾讯微信团队消息，安卓最新版微信已支持改微信号，入口在我&gt;个人信息&gt;微信号，用户可以一年修改一次微信号，如果用户最近一年有自定义过微信号，期满一年后也可以更改，iOS用户亦即将可以使用该功能。如果暂时还改不了，请大家稍等再试试。</span></span></p>', '安卓最新版微信已支持改微信号', '2020-06-05 17:07:50', 11, 'uploads/20200605170720684.jpg'),
(15, '妈妈陪女儿考研双双被录取', '帅哥', '考试', 10, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: left; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;"><strong>她们是幸福快乐的母女，亦是并肩战斗的同事，未来三年，她们还将成为同窗。</strong></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: left; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;">近日，西南医科大学公布了硕士研究生拟录取公示名单，学校附属医院儿科护士长，50岁的白永旗被公共管理专业拟录取，她25岁的女儿——2013级临床医学专业的露露（小名）被儿科学专业拟录取。</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: left; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;">这对相差25岁的母女同时被学校录取为硕士研究生，今天，小编带你一起走进他们背后的故事。</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: left; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;">她们是母女——妈妈陪女儿考研</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: left; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;">露露是我校2013级临床医学专业的学生，上大学时她并没有考研计划。大五那年，她临时报名“裸考”了一次，结果以失败告终。母亲白永旗在附属医院工作，常常给女儿灌输考研的重要性。</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: left; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;">2018年，露露又一次报名，依然选择了自己心仪的儿科学专业，这一次，还是因为准备不充分而失利。她有些失落，一度有过放弃的想法。白永旗鼓励女儿，只要坚持，就会成功。2019年9月，女儿第三次报名考研。</p><p><br style="text-indent: 2em; text-align: left;"/></p>', '两人既是母女又是同事未来将成为同窗', '2020-06-05 17:09:32', 1, 'uploads/20200605170853249.jpg'),
(16, '拜登正式锁定美国民主党总统候选人提名', 'carcar', '总统', 0, '<p><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">据美联社刚刚报道，在获得1991张代表票后，美国前副总统拜登正式锁定民主党总统候选人提名，将和特朗普在2020年总统大选中展开对决。</span><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">据美联社刚刚报道，在获得1991张代表票后，美国前副总统拜登正式锁定民主党总统候选人提名，将和特朗普在2020年总统大选中展开对决。</span><span style="color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);">据美联社刚刚报道，在获得1991张代表票后，美国前副总统拜登正式锁定民主党总统候选人提名，将和特朗普在2020年总统大选中展开对决。</span></p>', '拜登正式锁定美国民主党总统候选人提名拜登正式锁定美国民主党总统候选人提名', '2020-06-06 16:26:47', 4, 'uploads/20200606162618121.jpg'),
(17, '第1线新闻', 'carcar', '税费', 1, '<p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p"><span class="bjh-strong" style="font-size: 18px; font-weight: 700;">1丨即日起至年底，山东个体工商户和小微企业免除一切税费</span></span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">据央视新闻，6月6日，山东省政府办公厅印发《关于抓好保居民就业、保基本民生、保市场主体工作的十条措施的通知》。措施提出，加大免税力度。在全面落实国家减税降费政策基础上，在地方权限内，从文件发布之日至2020年12月31日，对个体工商户和小微企业免除一切税费。对承租国有资产类经营性房产的个体工商户和小微企业，在落实已经出台的减免或减半征收房租的优惠政策基础上，再将减半征收房租期限延长至2020年12月31日。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p"><span class="bjh-strong" style="font-size: 18px; font-weight: 700;">2丨斯里兰卡8月1日起将允许外国游客入境</span></span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">据央视新闻，6月5日，斯里兰卡旅游部门宣布，自8月1日起，将允许外国游客入境。外国游客应在登机前提供核酸检测阴性报告，检测时间应在登机前72小时内。落地斯里兰卡后，外国游客将在机场进行免费检测，无症状者无需隔离，检测结果为阳性者，则需在指定酒店或医院进行隔离。外国游客在斯境内需至少入住5晚。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p"><span class="bjh-strong" style="font-size: 18px; font-weight: 700;">3丨中国发现地球上“生物寄生关系”最早化石证据，距今5.2亿年</span></span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">据央视新闻，近日，由西北大学地质学系教授带领的早期生命研究所专家团队，对外发布了地球寒武纪生命大爆发时期的生物演化研究重要成果。研究人员发现了地球上“生物寄生关系”最早的化石证据，距今已有5.2亿年。西北大学地质学系早期生命研究所专家团队，自2010年起，历时10年，对云南省滇东地区乌龙菁组关山动物群进行了大规模发掘，收集了大量的舌形贝型腕足动物化石。这些腕足动物化石保存完好，以群落形势存在，分布范围超过6000平方公里。化石上，这些腕足动物的特殊形态栩栩如生。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p"><span class="bjh-strong" style="font-size: 18px; font-weight: 700;">4丨河南省启动Ⅳ级水旱灾害应急响应</span></span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">从河南省水利厅了解到，该厅发出通知，决定启动Ⅳ级水旱灾害应急响应。通知指出，5月以来，河南全省平均降雨量37.3毫米，较多年同期均值偏少四成多，特别是5月10日至6月5日，河南全省平均降雨量5.5毫米，较多年同期均值偏少九成多，为有资料记录以来，同期降雨量最少的一年。同时，河南全省出现大范围、持续性的高温天气，河道来水不断减少，水利工程蓄水不足，土壤失墒严重，旱情持续发展，对农业生产和部分主题宣传活动生活用水造成较大影响。</span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p"><span class="bjh-strong" style="font-size: 18px; font-weight: 700;">5丨北京社会救助对象每人将获400元补贴</span></span></p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bjh-p">据新京报，记者6月6日从北京市民政局获悉，在北京消费季活动中，全市社会救助对象将免费获得特殊消费补贴。发放对象为2019年12月31日登记在册和2020年1-5月审批通过的北京市最低生活保障、特困供养人员和低收入家庭，共涉及11.9万余人。补贴资金由财政资金和企业共同负担，其中市区两级政府按照每人200元的标准，物美集团按照每人200元的标准予以配套，为社会救助对象购买400元的生活用品。</span></p><p><br/></p>', '即日起至年底，山东个体工商户和小微企业免除一切税费', '2020-06-06 16:32:29', 6, 'uploads/20200606163208756.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `blog_category`
--

CREATE TABLE `blog_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `cate_title` varchar(255) DEFAULT NULL COMMENT '分类说明',
  `cate_keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '描述（SEO）',
  `cate_view` int(10) NOT NULL DEFAULT '0' COMMENT '查看次数',
  `cate_order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `cate_pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_category`
--

INSERT INTO `blog_category` (`cate_id`, `cate_name`, `cate_title`, `cate_keywords`, `cate_description`, `cate_view`, `cate_order`, `cate_pid`) VALUES
(1, '新闻', '123', '新闻，热点，第一线', '这是新闻这是最新的新闻', 11, 1, 0),
(2, '娱乐', '开开心心，高高兴兴', '', '', 1, 2, 0),
(3, '体育', '苏炳添第一名', NULL, NULL, 0, 3, 0),
(4, '八卦新闻', '谁和谁分手了', '125', '', 0, 1, 1),
(6, '泗水新闻', '荔枝涨价了', '荔枝涨价了', '荔枝涨价了', 0, 2, 1),
(7, '高州体育', '体育广场正在建设', '111', NULL, 0, 3, 3),
(8, '娱乐新闻', '罗某巷管理时间', NULL, NULL, 0, 2, 2),
(11, '娱乐至死', '娱乐至死', '娱乐至死', '娱乐至死', 3, 3, 2),
(13, '收到', '大道', '大师傅', '撒大声地', 0, 2, 3),
(17, '888挂新闻', '121313', '212131', '21324', 0, 2, 4);

-- --------------------------------------------------------

--
-- 表的结构 `blog_config`
--

CREATE TABLE `blog_config` (
  `conf_id` int(11) NOT NULL,
  `conf_title` varchar(50) DEFAULT NULL COMMENT '配置标题',
  `conf_name` varchar(50) DEFAULT NULL COMMENT '配置名称',
  `conf_content` text COMMENT '配置内容',
  `conf_order` int(11) NOT NULL DEFAULT '0' COMMENT '配置排序',
  `conf_tips` varchar(255) DEFAULT NULL COMMENT '配置说明',
  `field_type` varchar(50) DEFAULT NULL,
  `field_value` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_config`
--

INSERT INTO `blog_config` (`conf_id`, `conf_title`, `conf_name`, `conf_content`, `conf_order`, `conf_tips`, `field_type`, `field_value`) VALUES
(3, '网站状态', 'web_healthy', '1', 2, '这是网站状态说明。', 'radio', '1|开启，0|关闭'),
(2, '网站标题', 'web_title', '车车个人博客', 1, '这是网站标题说明', 'input', ''),
(4, '统计代码', 'web_code', '百度统计', 3, '这是统计代码说明', 'textarea', ''),
(5, '网站标题详解', 'seo_title', '帅气逼人的blog', 4, '', 'input', ''),
(6, '网站描述', 'web_description', '这是一个刚刚做的博客网站', 5, '', 'textarea', ''),
(7, '网站关键词', 'web_keywords', '帅气，完美，自夸', 7, '网站关键词说明', 'input', ''),
(8, '版权信息', 'web_banquan', 'Design by 车车编程社区 <a href="https://www.baidu.com/" target="_blank">http://www.cheche.club</a> ', 8, '', 'textarea', '');

-- --------------------------------------------------------

--
-- 表的结构 `blog_links`
--

CREATE TABLE `blog_links` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '友情链接名称',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `blog_links`
--

INSERT INTO `blog_links` (`link_id`, `link_name`, `link_title`, `link_url`, `link_order`) VALUES
(1, '广东轻院', '国家示范性搞笑', 'https://map.baidu.com/', 4),
(2, '广东茂名', '国家示范性城市', 'https://www.baidu.com/', 1),
(3, '茂名荔枝', '想不想吃', 'https://map.baidu.com/', 5);

-- --------------------------------------------------------

--
-- 表的结构 `blog_migrations`
--

CREATE TABLE `blog_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `blog_migrations`
--

INSERT INTO `blog_migrations` (`migration`, `batch`) VALUES
('2020_06_04_152047_create_links_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `blog_navs`
--

CREATE TABLE `blog_navs` (
  `nav_id` int(11) NOT NULL,
  `nav_name` varchar(50) DEFAULT NULL COMMENT '导航名',
  `nav_alias` varchar(50) DEFAULT NULL COMMENT '导航别名',
  `nav_url` varchar(100) DEFAULT NULL COMMENT '导航链接地址',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT '导航排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义导航数据表';

--
-- 转存表中的数据 `blog_navs`
--

INSERT INTO `blog_navs` (`nav_id`, `nav_name`, `nav_alias`, `nav_url`, `nav_order`) VALUES
(1, '首页', 'Protal', 'http://localhost/laravel/admin/index#', 1),
(7, '学无止境', 'Learn', 'https://', 6),
(2, '慢生活', 'Life', 'https://', 3),
(5, '碎言碎语', 'Doing', 'https://', 4),
(3, '关于我', 'About', 'https://', 2),
(6, '模板分享', 'Share', 'https://', 5),
(8, '留言版', 'Gustbook', 'https://', 7);

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

CREATE TABLE `blog_user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL COMMENT '用户名称',
  `pass` varchar(256) DEFAULT NULL COMMENT '登录密码',
  `power` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`id`, `name`, `pass`, `power`) VALUES
(1, 'admin', 'eyJpdiI6InVyNXU2R0IyTnNrYmpJeVYrVlp4Vmc9PSIsInZhbHVlIjoiNW1GbGVoU0ZNeFBQeXFcL3BQRjBBTkE9PSIsIm1hYyI6IjNlYTA0NzllMjQ4Nzc4N2RkNmIwYjkwMjQxMDg1MGNjMjExYWNhODk2YmY2ZjBkZTJkNDBhZmYzNzQ3MDA0NzgifQ==', 1),
(2, 'sm181', 'eyJpdiI6ImI1REk4YjB6Q2VxUzQxRTFOc0FZeWc9PSIsInZhbHVlIjoiM2ZibU9qK01NS2xjdjVWZ0Vqbm93dz09IiwibWFjIjoiNjM0M2MzZmFlODJiYjIxNmE5NGVmMzdjN2M0OTJhNzQwNDBlMjUxYTVmMGE0NjQ2NzQzOTk5MTFlYjIxZGQ0ZCJ9', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_article`
--
ALTER TABLE `blog_article`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `blog_config`
--
ALTER TABLE `blog_config`
  ADD PRIMARY KEY (`conf_id`);

--
-- Indexes for table `blog_links`
--
ALTER TABLE `blog_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `blog_navs`
--
ALTER TABLE `blog_navs`
  ADD PRIMARY KEY (`nav_id`);

--
-- Indexes for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `blog_article`
--
ALTER TABLE `blog_article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `blog_config`
--
ALTER TABLE `blog_config`
  MODIFY `conf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `blog_links`
--
ALTER TABLE `blog_links`
  MODIFY `link_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `blog_navs`
--
ALTER TABLE `blog_navs`
  MODIFY `nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
