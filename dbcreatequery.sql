-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.5.19-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 테이블 animesite.anime_data 구조 내보내기
CREATE TABLE IF NOT EXISTS `anime_data` (
  `anime_no` int(11) NOT NULL AUTO_INCREMENT,
  `anime_name` varchar(255) NOT NULL,
  `anime_description` text NOT NULL,
  `anime_type` varchar(255) NOT NULL,
  `anime_studios` varchar(255) NOT NULL,
  `anime_date` date NOT NULL,
  `anime_status` varchar(255) NOT NULL,
  `anime_genre` varchar(255) NOT NULL,
  `anime_scores` decimal(3,2) NOT NULL,
  `anime_rating` decimal(3,2) NOT NULL,
  `anime_duration` int(11) NOT NULL,
  `anime_quality` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `anime_category` varchar(255) NOT NULL,
  PRIMARY KEY (`anime_no`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 테이블 데이터 animesite.anime_data:~21 rows (대략적) 내보내기
/*!40000 ALTER TABLE `anime_data` DISABLE KEYS */;
INSERT IGNORE INTO `anime_data` (`anime_no`, `anime_name`, `anime_description`, `anime_type`, `anime_studios`, `anime_date`, `anime_status`, `anime_genre`, `anime_scores`, `anime_rating`, `anime_duration`, `anime_quality`, `views`, `anime_category`) VALUES
	(1, '바이올렛 애버가든', '"고객님이 원하시면 어디든지 달려가겠습니다. 자동 수기인형 서비스, 바이올렛 에버가든입니다." 바이올렛 에버가든이라는 소녀와의 만남이 끊어져 버릴 뻔한 두 사람의 미래를 이어 나간다. 삶에 절망하던 소녀가 "영원"을 찾는 이야기.', 'TV', 'Kyoto Animation', '2020-03-26', 'FINISHED', 'drama/fantasy', 8.90, 9.99, 24, 'HD', 4, 'hero'),
	(2, '스파이 X 패밀리', '초일류 스파이 "황혼"에게 어느 날 떨어진 미션, "가족"을 만들어 명문학교에 잠입하라! 하지만 독신인데다 아내와 자식을 동시에 만들어야 하는 난감한 상황. 어떻게든 가족을 만들어 명문교에 잠입하지 않으면 세상은 파멸(?)의 길로 빠질 가능성도 있다. 이 상황에서 《황혼》이 선택한 "가족"은?!', 'TV', 'WIT stidio x Clover Works ', '2022-04-09', 'AIRING', 'drama/comedy/action', 8.90, 9.99, 24, 'HD', 0, 'hero'),
	(3, '진격의 거인', '시간은 845년, 거인을 막기 위한 거대한 장벽이 들어선 월 마리아(Wall Maria)의 \'미끼 구역\' 시간시나구(區). 월 마리아가 무너지며 거인들이 넘어온 그날, 인류는 떠올렸다. 놈들에게 지배당하던 공포를. 새장 안에 갇혀있던 굴욕을.', 'TV', 'WIT stidio ', '2013-04-07', 'FINISHED', 'dark fantasy/action/war', 8.90, 9.99, 24, 'HD', 2, 'hero'),
	(4, '나루토', '소년 나루토는 자신이 도쿄로 이적했을 때 아버지의 부하로 여기인을 죽였다는 거짓말을 들었다. 그렇게 시작된 신세계의 발자취를 밟으며 나루토는 친구와 함께 강력한 적들과의 전투를 통해 자신의 꿈을 향해 달려간다.', 'TV', 'Studio Pierrot', '2002-10-03', 'FINISHED', 'action/adventure', 8.40, 9.00, 24, 'SD', 0, 'trend'),
	(5, '귀멸의 칼날', '탄탄한 초자연력을 지닌 소년 카마도 탄지로는 어느 날 가족을 몰살한 마두라에게 복수하기 위해 귀신 사냥꾼 단체인 "귀살인"에 합류한다. 그리고 전투를 거듭하며 자신의 능력을 키워가는 동시에 인간성을 지키기 위해 노력한다.', 'TV', 'ufotable', '2019-04-06', 'FINISHED', 'action/fantasy', 8.70, 9.50, 24, 'HD', 0, 'trend'),
	(6, '빈란드 사가', '거인과 인간이 싸우는 세상. 모든 인간은 벽으로 둘러싸인 안에서 살고 있었는데, 그 안에서도 생존을 위한 싸움은 계속된다. 거인을 상대하기 위한 선조들의 기술, 오드메노기, 그것은 인간 종말을 예고하는 파멸의 복권이 될 수도 있었다. 두 소년, 에렌과 미카사, 그들은 오드메노기의 힘으로 세상을 구할 수 있을까?', 'TV', 'WIT STUDIO', '2019-04-28', 'FINISHED', 'action/fantasy', 8.23, 9.20, 24, 'HD', 0, 'trend'),
	(7, '도쿄 구울', '인간을 사냥하고 살아가는 괴인(구울)들의 세계를 그린 다크 판타지 애니메이션입니다. 주인공 칸키는 인간과 구울의 이중 생활 속에서 갈등하며 성장하는 이야기를 담고 있습니다.', 'TV', 'Studio Pierrot', '2014-07-04', 'FINISHED', 'dark fantasy/action/horror', 8.30, 9.10, 24, 'HD', 8, 'trend'),
	(8, '명탐정 코난', '고등학생 탐정 신이치와 변신한 초등학생 신지치의 모험을 그린 추리 애니메이션입니다. 신이치가 어린 시절로 돌아와 신지치로 변신한 후, 다양한 사건을 해결하며 자신의 신원을 찾는 이야기를 풀어갑니다.', 'TV', 'TMS Entertainment', '1996-01-08', 'ARING', 'mistery/detective', 8.40, 9.20, 24, 'HD', 1, 'trend'),
	(9, '은혼', '외계인과 인간이 공존하는 일본의 평범한 거리를 배경으로 벌어지는 코믹 액션 애니메이션입니다. 주인공 김봉삼(桂小太郎)과 그의 친구들이 다양한 대결과 사건을 풀어나가며 특유의 풍자와 개그, 그리고 감동적인 이야기를 선사합니다.', 'TV', 'Sunrise', '2006-04-04', 'FINISHED', 'action/comedy', 8.70, 9.20, 24, 'HD', 0, 'trend'),
	(10, '호리미야', '고등학교 동아리 회장인 호리미야 마키와 그의 동료들이 학교 생활을 통해 성장하는 이야기를 그린 로맨틱 코미디 애니메이션입니다. 유쾌하고 달달한 이야기와 캐릭터들의 우정과 사랑 모험을 즐길 수 있습니다.', 'TV', 'Lerche', '2014-07-04', 'FINISHED', 'romantic/comedy', 8.60, 9.00, 24, 'HD', 1, 'popular'),
	(11, '케이온!', '전자 악기 동아리인 "활동적인 라이트 음악부"에 입단한 소녀들의 일상과 음악을 통해 꿈을 향해 나아가는 이야기를 그린 음악/코미디 애니메이션입니다. 유쾌하고 유쨩한 캐릭터들과 함께하는 밝고 경쾌한 이야기를 즐길 수 있습니다.', 'TV', 'Kyoto Animation', '2009-04-03', 'FINISHED', 'music/comedy', 8.20, 8.80, 24, 'HD', 1, 'popular'),
	(12, '월간순정 노자키군', '진중한 학생회장인 노자키 군이 은밀하게 월간 로맨스 소설 작가로서의 이중생활을 하며 코믹한 상황과 로맨스를 그린 애니메이션입니다. 귀여운 캐릭터와 달달한 사랑 이야기로 가득한 이 작품은 로맨틱 코미디 애니메이션의 대표작 중 하나입니다.', 'TV', 'Doga Kobo', '2015-07-02', 'FINISHED', 'romantic/comedy', 8.10, 8.70, 24, 'HD', 1, 'popular'),
	(13, '원펀맨', '평범한 사무직 직원인 사이타마는 한 날 괴물에게 공격당한 후 극도의 훈련을 거쳐 강해진 결과, 누구든 한방에 쓰러뜨릴 수 있는 원펀맨이 되었습니다. 그러나 그의 힘에 지친 일상 속에서도 지루함을 느끼며 새로운 도전과 싸움을 찾는 이야기를 그린 액션/코미디 애니메이션입니다.', 'TV', 'Madhouse', '2015-10-04', 'FINISHED', 'action/comedy', 8.80, 9.10, 24, 'HD', 0, 'popular'),
	(14, 'Re:제로부터 시작하는 이세계 생활', '갑작스러운 이세계로의 이동 후 매일 반복되는 생활 속에서 성장하고 사건들을 해결하며 자신의 운명을 풀어가는 이야기를 그린 판타지/드라마 애니메이션입니다. 주인공 슈바루는 죽음과 다시 시작하는 과정을 거치며 자신의 약점과 진정한 의미를 발견하게 됩니다.', 'TV', 'White Fox', '2016-04-04', 'FINISHED', 'fantasy/drama', 8.70, 9.00, 24, 'HD', 2, 'popular'),
	(15, '강철의 연금술사', '알폰스와 에드와드 엘릭이라는 두 형제가 잃어버린 몸을 되찾기 위해 연금술을 사용하며 모험을 떠나는 이야기를 그린 판타지/액션 애니메이션입니다. 사회적 이슈와 인간 본성에 대한 논리적인 표현을 담은 이 작품은 흥미진진한 스토리와 멋진 액션 장면으로 관객들을 매료시킵니다.', 'TV', 'Bones', '2009-04-05', 'FINISHED', 'fantasy/action', 8.90, 9.20, 24, 'HD', 2, 'popular'),
	(16, '블랙클로버', '평범한 고등학생이 신비한 무한퇴마사의 힘을 갖게 되면서 다른 세계로 빨려들어 싸움을 벌이는 판타지/액션 애니메이션입니다. 신선하고 흥미로운 스토리와 다양한 마법 능력을 가진 캐릭터들이 등장하여 관객을 매료시킵니다.', 'TV', 'Studio Pierrot', '2023-03-12', 'AIRING', 'fantasy/action', 8.40, 9.00, 24, 'HD', 0, 'recent'),
	(17, '미라큘러스: 레이디버그와 블랙캣', '파리의 영웅인 레이디버그와 블랙캣이 악당과 싸우며 도시를 지키는 모험을 그린 액션/어드벤처 애니메이션입니다. 독특한 캐릭터 디자인과 재미있는 전투 장면으로 인기를 끌며, 젊은 관객들에게 인기를 얻고 있습니다.', 'TV', 'Zagtoon, Method Animation, Toei Animation', '2022-09-17', 'AIRING', 'action/adventure', 8.20, 8.50, 24, 'HD', 0, 'recent'),
	(18, '주술회전', '신들이 선사한 기술로 빛나던 나라가 멸망한 지 1000년 후. 인간들은 나무와 더불어 살아가며, 지하에서 나타난 "장기말"을 퇴치하는 기사단과 함께 살아남으려 애쓴다. 어느 날, 새로 합류한 소년 "린"은 지상에 내려가면서 다가오는 재앙을 막기 위한 "잔여신전"을 찾기 위한 여행을 떠나는데...', 'TV', 'Mappa', '2022-04-03', 'AIRING', 'action/fantasy', 8.50, 9.00, 24, 'HD', 0, 'recent'),
	(19, '오르텐시아 사가', '근사한 음악으로 도시 전체를 덮치는 "악곡", 그리고 악곡을 기반으로 작성된 "스코어"가 등장한 세계. 천재 작곡가이자 음악학자인 "클라우스"는 국가적인 위상을 지닌 "오르텐시아 교황청"의 작곡가로서 선발되었다. 그러나 어느 날, 교황청에서 일어난 일로 인해 "클라우스"는 동료 "쿠미코"와 함께 전투를 벌이면서 세상의 진실을 찾아가는 이야기를 그린 액션/판타지 애니메이션입니다.', 'TV', 'J.C.Staff', '2022-04-10', 'AIRING', 'action/fantasy', 8.20, 8.90, 24, 'HD', 0, 'recent'),
	(20, '신세계 건설사', '신비한 마법의 힘으로 세계를 건설하는 건설사들의 이야기를 그린 판타지/어드벤처 애니메이션입니다. 주인공들이 새로운 대지를 발견하고 건물을 세우며 위험과 도전을 극복하는 모습을 담고 있습니다.', 'TV', 'Production I.G', '2023-02-01', 'AIRING', 'fantasy/adventure', 8.50, 8.90, 24, 'HD', 0, 'recent'),
	(21, '책벌레의 하극상', '오늘의 운세를 알려주는 특별한 책을 판매하는 책사의 이야기를 그린 일상/판타지 애니메이션입니다. 주인공이 다양한 사람들의 운세를 알려주면서 사랑과 우정의 이야기를 펼치며 즐거운 일상 속에서 벌어지는 사건들을 다룹니다.', 'TV', 'A-1 Pictures', '2023-03-15', 'AIRING', 'drama/fantasy', 8.20, 8.70, 24, 'HD', 0, 'recent');
/*!40000 ALTER TABLE `anime_data` ENABLE KEYS */;

-- 테이블 animesite.follows 구조 내보내기
CREATE TABLE IF NOT EXISTS `follows` (
  `user_no` int(11) NOT NULL,
  `anime_no` int(11) NOT NULL,
  `follow_flag` char(1) NOT NULL DEFAULT '0',
  KEY `user_no` (`user_no`),
  KEY `anime_no` (`anime_no`),
  CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`user_no`) REFERENCES `user_info` (`user_no`),
  CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`anime_no`) REFERENCES `anime_data` (`anime_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 테이블 데이터 animesite.follows:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;

-- 테이블 animesite.user_comment 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_comment` (
  `comment_no` int(11) NOT NULL AUTO_INCREMENT,
  `anime_no` int(11) NOT NULL,
  `user_no` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_no`),
  KEY `user_no` (`user_no`),
  KEY `anime_no` (`anime_no`),
  CONSTRAINT `user_comment_ibfk_1` FOREIGN KEY (`user_no`) REFERENCES `user_info` (`user_no`),
  CONSTRAINT `user_comment_ibfk_2` FOREIGN KEY (`anime_no`) REFERENCES `anime_data` (`anime_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 테이블 데이터 animesite.user_comment:~1 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_comment` DISABLE KEYS */;
INSERT IGNORE INTO `user_comment` (`comment_no`, `anime_no`, `user_no`, `comment_content`, `comment_date`) VALUES
	(1, 1, 1, '바이올렛 애버가든 재미있게 봤습니다.', '2023-05-18 10:13:20');
/*!40000 ALTER TABLE `user_comment` ENABLE KEYS */;

-- 테이블 animesite.user_info 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_no` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 테이블 데이터 animesite.user_info:~5 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT IGNORE INTO `user_info` (`user_no`, `user_id`, `user_pw`, `user_name`) VALUES
	(1, 'php506', '506', '오공육'),
	(2, 'dldmstnr', 'dldmstnr', '이은숙'),
	(3, 'rlarkqtns', 'rlarkqtns', '김갑순'),
	(4, 'rladuddnd', 'rlaruddnd', '김영웅'),
	(5, 'rlatnswk', 'rlatnswk', '김순자');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
