-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 09:00 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simonpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id_about_us` int(1) NOT NULL,
  `text_about_us` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id_about_us`, `text_about_us`) VALUES
(1, '<!--[if !mso]><style>v\\:* {behavior:url(#default#VML);}o\\:* {behavior:url(#default#VML);}w\\:* {behavior:url(#default#VML);}.shape {behavior:url(#default#VML);}</style><![endif]--><!--[if gte mso 9]><xml> <o:OfficeDocumentSettings>  <o:AllowPNG></o:AllowPNG> </o:OfficeDocumentSettings></xml><![endif]--><!--[if gte mso 9]><xml> <w:WordDocument>  <w:View>Normal</w:View>  <w:Zoom>0</w:Zoom>  <w:TrackMoves>false</w:TrackMoves>  <w:TrackFormatting></w:TrackFormatting>  <w:PunctuationKerning></w:PunctuationKerning>  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>  <w:DoNotPromoteQF></w:DoNotPromoteQF>  <w:LidThemeOther>EN-US</w:LidThemeOther>  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>  <w:Compatibility>   <w:BreakWrappedTables></w:BreakWrappedTables>   <w:SnapToGridInCell></w:SnapToGridInCell>   <w:WrapTextWithPunct></w:WrapTextWithPunct>   <w:UseAsianBreakRules></w:UseAsianBreakRules>   <w:DontGrowAutofit></w:DontGrowAutofit>   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>   <w:EnableOpenTypeKerning></w:EnableOpenTypeKerning>   <w:DontFlipMirrorIndents></w:DontFlipMirrorIndents>   <w:OverrideTableStyleHps></w:OverrideTableStyleHps>  </w:Compatibility>  <m:mathPr>   <m:mathFont m:val="Cambria Math"></m:mathFont>   <m:brkBin m:val="before"></m:brkBin>   <m:brkBinSub m:val="--"></m:brkBinSub>   <m:smallFrac m:val="off"></m:smallFrac>   <m:dispDef></m:dispDef>   <m:lMargin m:val="0"></m:lMargin>   <m:rMargin m:val="0"></m:rMargin>   <m:defJc m:val="centerGroup"></m:defJc>   <m:wrapIndent m:val="1440"></m:wrapIndent>   <m:intLim m:val="subSup"></m:intLim>   <m:naryLim m:val="undOvr"></m:naryLim>  </m:mathPr></w:WordDocument></xml><![endif]--><!--[if gte mso 9]><xml> <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"  DefSemiHidden="true" DefQFormat="false" DefPriority="99"  LatentStyleCount="267">  <w:LsdException Locked="false" Priority="0" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>  <w:LsdException Locked="false" Priority="9" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>  <w:LsdException Locked="false" Priority="10" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>  <w:LsdException Locked="false" Priority="11" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>  <w:LsdException Locked="false" Priority="22" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>  <w:LsdException Locked="false" Priority="20" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>  <w:LsdException Locked="false" Priority="59" SemiHidden="false"   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>  <w:LsdException Locked="false" Priority="1" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>  <w:LsdException Locked="false" Priority="34" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>  <w:LsdException Locked="false" Priority="29" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>  <w:LsdException Locked="false" Priority="30" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>  <w:LsdException Locked="false" Priority="60" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="61" SemiHidden="false"   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="62" SemiHidden="false"   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="63" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="64" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="65" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="66" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="67" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="68" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="69" SemiHidden="false"   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="70" SemiHidden="false"   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="71" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="72" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="73" SemiHidden="false"   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>  <w:LsdException Locked="false" Priority="19" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>  <w:LsdException Locked="false" Priority="21" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>  <w:LsdException Locked="false" Priority="31" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>  <w:LsdException Locked="false" Priority="32" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>  <w:LsdException Locked="false" Priority="33" SemiHidden="false"   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException> </w:LatentStyles></xml><![endif]--><!--[if gte mso 10]><style> /* Style Definitions */ table.MsoNormalTable	{mso-style-name:"Table Normal";	mso-tstyle-rowband-size:0;	mso-tstyle-colband-size:0;	mso-style-noshow:yes;	mso-style-priority:99;	mso-style-parent:"";	mso-padding-alt:0in 5.4pt 0in 5.4pt;	mso-para-margin-top:0in;	mso-para-margin-right:0in;	mso-para-margin-bottom:8.0pt;	mso-para-margin-left:0in;	line-height:107%;	mso-pagination:widow-orphan;	font-size:11.0pt;	font-family:"Calibri","sans-serif";	mso-ascii-font-family:Calibri;	mso-ascii-theme-font:minor-latin;	mso-hansi-font-family:Calibri;	mso-hansi-theme-font:minor-latin;	mso-bidi-font-family:"Times New Roman";	mso-bidi-theme-font:minor-bidi;}</style><![endif]--><p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal; text-align: justify;"><b style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;font-family:" verdana","sans-serif";mso-fareast-font-family:"times="" new="" roman";="" mso-bidi-font-family:"times="" roman";color:#424242"="">SELAYANG PANDANG DIVISI KONSTRUKSI</span></b><span style="font-size:12.0pt;font-family:" times="" new="" roman","serif";="" mso-fareast-font-family:"times="" roman""=""> </span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in;line-height:115%"><span style="font-size:12.0pt;line-height:115%;font-family:" verdana","sans-serif";mso-fareast-font-family:="" "times="" new="" roman";mso-bidi-font-family:"times="" roman""="">&nbsp;</span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in;line-height:115%"><span style="font-size:12.0pt;line-height:115%;font-family:" verdana","sans-serif";mso-fareast-font-family:="" "times="" new="" roman";mso-bidi-font-family:"times="" roman""="">Divisi PengelolaanKonstruksi (PlK) adalah divisi yang memiliki tugas menentukan spesifikasiteknis dan perancangan gedung kantor, Rumah Bank Indonesia (RBI) dan bangunanlain serta wujud fisik lainnya termasuk perizinannya, juga bertanggungjawabatas terkelola dan terlaksananya suatu proyek konstruksi secara tepat waktu,berkualitas dengan biaya yang terukur. </span><span style="font-size:12.0pt;line-height:115%;font-family:" times="" new="" roman","serif";mso-fareast-font-family:="" "times="" roman""=""></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in;line-height:115%"><span style="font-size:12.0pt;line-height:115%;font-family:" verdana","sans-serif";mso-fareast-font-family:="" "times="" new="" roman";mso-bidi-font-family:"times="" roman""="">Divisi PlK berperanaktif dalam mendukung visi dan misi DPLF dengan mendukung tugas BI melaluipemberian layanan yang prima dan pengelolaan yang berkualitas di bidanglogistic, kearsipan dan pengamanan sesuai tata kelola yang baik dengan mengacupada praktek terbaik.</span><span style="font-size:12.0pt;line-height:115%;font-family:" times="" new="" roman","serif";mso-fareast-font-family:"times="" roman""=""></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in;line-height:115%"><span style="font-size:12.0pt;line-height:115%;font-family:" verdana","sans-serif";mso-fareast-font-family:="" "times="" new="" roman";mso-bidi-font-family:"times="" roman""="">Bila dilihat daristruktur organisasi Departemen Pengelolaan Logistik dan Fasilitas (DPLF),Divisi PlK berada di dalam Grup Pengelolaan Logistik, bersama dengan DivisiPengelolaan Logistik Kantor Pusat dan Kantor Perwakilan Luar Negera (PLKP),Divisi Pengelolaan Logistik Kantor Perwakilan Dalam Negeri (PLDN) dan DivisiPemanfaatan dan Pemulihan Aset (PPA).</span><span style="font-size:12.0pt;line-height:115%;font-family:" times="" new="" roman","serif";mso-fareast-font-family:="" "times="" roman""=""></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;text-indent:.5in;line-height:115%"><span style="font-size:12.0pt;line-height:115%;font-family:" verdana","sans-serif";mso-fareast-font-family:="" "times="" new="" roman";mso-bidi-font-family:"times="" roman""="">Dalam pelaksanaantugasnya, Divisi PlK berhubungan sangat erat dengan unit kerja dan satuan kerjalainnya yaitu Divisi Kebijakan Logistik (DKL), Divisi Perencanaan Logistik(DPL) dan Departemen Pengadaan Strategis (DPS). Bisa diibaratkan DKL dan DPLadalah <i style="mso-bidi-font-style:normal">starting point</i> dari seluruhrangkaian kegiatan Divisi PlK sedangkan DPS adalah partner yang memungkinkanterlaksananya kegiatan tersebut.</span><span style="font-size:12.0pt;line-height:115%;font-family:" times="" new="" roman","serif";mso-fareast-font-family:="" "times="" roman""=""></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""=""><span style="mso-spacerun:yes">&nbsp; </span></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light""="">STRUKTUR ORGANISASI DIVISI PENGELOLAAN KONSTRUKSI</span></b></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:150%" align="center"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light";="" mso-no-proof:yes"=""><br></span></b></p><img style="width: 536px; float: none;" src="upload/about_us/Struktur_Organisasi_PlK2.PNG"><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:150%" align="center"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light";="" mso-no-proof:yes"=""><br></span></b><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light""=""></span></b></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light""="">&nbsp;</span></b></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light""="">HUBUNGAN KERJA DENGAN DKL, DPL dan DPS</span></b></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""="">DPLFmendukung tugas BI melalui pemberian layanan yang prima dan pengelolaan yangberkualitas</span><span style="mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">&nbsp;</span><span style="font-family:" frutiger="" 45="" light""="">di bidang logistik, kearsipan, dan pengamanan, sesuai tatakelola yang baik.</span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""=""><br></span></p><img style="width: 527.5px; float: none;" src="upload/about_us/Hubungan_DKL_DPL_dan_DPS2.PNG"><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""=""><br></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:150%" align="center"><span style="font-family:" frutiger="" 45="" light";="" mso-no-proof:yes"=""></span><span style="font-family:" frutiger="" 45="" light""=""></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""="">&nbsp;</span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><b style="mso-bidi-font-weight:normal"><span style="font-size:14.0pt;line-height:150%;font-family:" frutiger="" 45="" light""="">VISI DAN MISI DPLF</span></b></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""="">Visi:menjadi mitra strategis melalui pemberian layanan prima dan peningkatankualitas pengelolaan yang berkelanjutan di bidang logistic, kearsipan danpengamanan dengan mengacu pada praktek terbaik.</span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:justify;line-height:150%"><span style="font-family:" frutiger="" 45="" light""="">Misi :mendukung tugas BI melalui pelaksanaan fungsi pengelolaan layanan di bidanglogistic, kearsipan, dan pengamanan sesuai tata kelola yang baik.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `userid` varchar(11) DEFAULT NULL,
  `modul` varchar(150) NOT NULL COMMENT '1:anggaran, 2:proyek, 3:perpustakaan',
  `tipe` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `description`, `date`, `userid`, `modul`, `tipe`) VALUES
(8197, 'Anggaran baru', '2018-11-12 15:08:55', '6bmgy', 'anggaran_investasi', 1),
(8198, 'Anggaran baru', '2018-11-12 15:10:46', '6bmgy', 'anggaran_investasi', 1),
(8199, 'Anggaran baru', '2018-11-12 19:19:24', '6bmgy', 'anggaran_investasi', 1),
(8200, 'Anggaran baru', '2018-11-12 19:20:48', '6bmgy', 'anggaran_investasi', 1),
(8201, 'Anggaran Investasi baru', '2018-11-12 22:23:58', '6bmgy', 'anggaran_investasi', 1),
(8202, 'Anggaran Investasi baru', '2018-11-12 22:24:20', '6bmgy', 'anggaran_investasi', 1),
(8203, 'Anggaran Investasi dihapus [ID: 3]', '2018-11-12 23:13:27', '6bmgy', 'anggaran_investasi', 3),
(8204, 'Anggaran Update [ID: 4]', '2018-11-12 23:18:05', '6bmgy', 'anggaran_investasi', 2),
(8205, 'Anggaran baru', '2018-11-12 23:18:34', '6bmgy', 'anggaran_investasi', 1),
(8206, 'Anggaran Update [ID: 7]', '2018-11-12 23:18:43', '6bmgy', 'anggaran_investasi', 2),
(8207, 'Anggaran Update [ID: 5]', '2018-11-12 23:20:48', '6bmgy', 'anggaran_investasi', 2),
(8208, 'proyek baru', '2018-11-13 05:09:14', '6bmgy', 'proyek', 1),
(8209, 'Update User Req Deadline 12-11-2018', '2018-11-13 08:28:42', '6bmgy', 'proyek', 2),
(8210, 'Update User Req Deadline 13-11-2018', '2018-11-13 08:30:22', '6bmgy', 'proyek', 2),
(8211, 'Update User Req Deadline 13-11-2018', '2018-11-13 08:39:47', '6bmgy', 'proyek', 2),
(8212, 'Update User Req Deadline 27-11-2018', '2018-11-13 08:39:55', '6bmgy', 'proyek', 2),
(8213, 'Update User Req Deadline 28-11-2018', '2018-11-13 08:39:59', '6bmgy', 'proyek', 2),
(8214, 'Update User Req Deadline 28-11-2018', '2018-11-13 08:40:17', '6bmgy', 'proyek', 2),
(8215, 'Update User Req Deadline 29-11-2018', '2018-11-13 08:40:22', '6bmgy', 'proyek', 2),
(8216, 'Update User Req Deadline 28-11-2018', '2018-11-13 08:40:45', '6bmgy', 'proyek', 2),
(8217, 'proyek Update [ID: 1]', '2018-11-13 09:21:38', '6bmgy', 'proyek', 2),
(8218, 'proyek Update [ID: 1]', '2018-11-13 09:28:42', '6bmgy', 'proyek', 2),
(8219, 'Update User Req Deadline 01-06-2015', '2018-11-13 09:33:51', '6bmgy', 'proyek', 2),
(8220, 'Update User Req Deadline 24-06-2015', '2018-11-13 09:34:01', '6bmgy', 'proyek', 2),
(8221, 'Update User Req Deadline 31-07-2015', '2018-11-13 09:34:10', '6bmgy', 'proyek', 2),
(8222, 'Update User Req Deadline 31-07-2015', '2018-11-13 09:34:23', '6bmgy', 'proyek', 2),
(8223, 'Update User Req Deadline 06-11-2018', '2018-11-13 11:15:11', '6bmgy', 'proyek', 2),
(8224, 'Update User Req Deadline 13-11-2018', '2018-11-13 11:15:34', '6bmgy', 'proyek', 2),
(8225, 'Update User Req Deadline 21-11-2018', '2018-11-13 11:15:46', '6bmgy', 'proyek', 2),
(8226, 'proyek Update [ID: 1]', '2018-11-13 11:19:24', '6bmgy', 'proyek', 2),
(8227, 'Update User Req Deadline 06-11-2018', '2018-11-13 13:22:33', '6bmgy', 'proyek', 2),
(8228, 'User baru [ Nama: Dpramadya]', '2018-11-13 13:40:14', '6bmgy', '', 0),
(8229, 'User baru [ Nama: Ocfirst]', '2018-11-13 15:24:19', 'n8950', '', 0),
(8230, 'User baru [ Nama: Muamar]', '2018-11-13 15:25:57', 'n8950', '', 0),
(8231, 'proyek baru', '2018-11-13 15:34:36', 'n8950', 'proyek', 1),
(8232, 'Update User Req Deadline ', '2018-11-13 15:35:11', 'n8950', 'proyek', 2),
(8233, 'proyek baru', '2018-11-13 15:37:25', 'n8950', 'proyek', 1),
(8234, 'proyek Update [ID: 3]', '2018-11-13 15:45:17', 'n8950', 'proyek', 2),
(8235, 'Update User Req Deadline ', '2018-11-13 15:55:46', 'n8950', 'proyek', 2),
(8236, 'Update User Req Deadline 01-11-2016', '2018-11-13 15:57:24', 'n8950', 'proyek', 2),
(8237, 'Update User Req Deadline 28-11-2016', '2018-11-13 15:57:42', 'n8950', 'proyek', 2),
(8238, 'Update User Req Deadline 01-12-2017', '2018-11-13 15:57:57', 'n8950', 'proyek', 2),
(8239, 'Update User Req Deadline ', '2018-11-13 15:58:03', 'n8950', 'proyek', 2),
(8240, 'Update User Req Deadline 01-12-2016', '2018-11-13 15:58:11', 'n8950', 'proyek', 2),
(8241, 'Update User Req Deadline 02-01-2017', '2018-11-13 15:58:21', 'n8950', 'proyek', 2),
(8242, 'proyek Update [ID: 3]', '2018-11-13 16:00:38', 'n8950', 'proyek', 2),
(8243, 'SPK baru [ Nama: ]', '2018-11-14 06:07:02', '6bmgy', 'spk', 1),
(8244, 'SPK baru [ Nama: Pekerjaan Perancangan Renovasi Rumah jabatan Kepala Perwakilan Dalam Negeri Provinsi Bali]', '2018-11-14 06:09:30', '6bmgy', 'spk', 1),
(8245, 'SPK baru [ Nama: Pekerjaan Perancangan Renovasi Rumah jabatan Kepala Perwakilan Dalam Negeri Provinsi Bali]', '2018-11-14 06:10:44', '6bmgy', 'spk', 1),
(8246, 'SPK baru [ Nama: aaa]', '2018-11-14 09:41:20', '6bmgy', 'spk', 1),
(8247, 'SPK baru [ Nama: aaaa]', '2018-11-14 09:50:16', '6bmgy', 'spk', 1),
(8248, 'SPK baru [ Nama: aaaa12]', '2018-11-14 09:54:55', '6bmgy', 'spk', 1),
(8249, 'SPK baru [ Nama: aaaa12]', '2018-11-14 09:55:12', '6bmgy', 'spk', 1),
(8250, 'SPK dihapus [ID: 4]', '2018-11-14 10:04:45', '6bmgy', '', 0),
(8251, 'SPK baru [ Nama: aaaaaaa]', '2018-11-14 10:04:55', '6bmgy', 'spk', 1),
(8252, 'SPK baru [ Nama: aaaaaaa]', '2018-11-14 10:08:14', '6bmgy', 'spk', 1),
(8253, 'SPK baru [ Nama: bbbb]', '2018-11-14 10:15:37', '6bmgy', 'spk', 1),
(8254, 'SPK baru [ Nama: cccc]', '2018-11-14 10:17:49', '6bmgy', 'spk', 1),
(8255, 'SPK dihapus [ID: 7]', '2018-11-14 10:18:23', '6bmgy', '', 0),
(8256, 'SPK dihapus [ID: 6]', '2018-11-14 10:18:29', '6bmgy', '', 0),
(8257, 'SPK dihapus [ID: 5]', '2018-11-14 10:18:34', '6bmgy', '', 0),
(8258, 'SPK baru [ Nama: aaaa]', '2018-11-14 10:18:40', '6bmgy', 'spk', 1),
(8259, 'Update User Req Deadline 01-01-2018', '2018-11-14 10:22:18', '6bmgy', 'proyek', 2),
(8260, 'SPK baru [ Nama: aaa]', '2018-11-14 10:43:30', '6bmgy', 'spk', 1),
(8261, 'SPK baru [ Nama: dddd]', '2018-11-14 10:48:06', '6bmgy', 'spk', 1),
(8262, 'SPK baru [ Nama: fffff]', '2018-11-14 10:54:05', '6bmgy', 'spk', 1),
(8263, 'SPK dihapus [ID: 11]', '2018-11-14 10:54:47', '6bmgy', '', 0),
(8264, 'SPK baru [ Nama: gggg]', '2018-11-14 10:54:56', '6bmgy', 'spk', 1),
(8265, 'Update User Req Deadline 29-11-2018', '2018-11-14 11:06:19', '6bmgy', 'proyek', 2),
(8266, 'Update User Req Deadline 30-11-2018', '2018-11-14 11:06:54', '6bmgy', 'proyek', 2),
(8267, 'Update User Req Deadline 30-11-2018', '2018-11-14 11:08:56', '6bmgy', 'proyek', 2),
(8268, 'Update User Req Deadline 29-11-2018', '2018-11-14 11:09:02', '6bmgy', 'proyek', 2),
(8269, 'Update User Req Deadline 30-11-2018', '2018-11-14 11:09:05', '6bmgy', 'proyek', 2),
(8270, 'Update User Req Deadline 14-11-2018', '2018-11-14 11:10:37', '6bmgy', 'proyek', 2),
(8271, 'Update User Req Deadline 22-11-2018', '2018-11-14 11:10:44', '6bmgy', 'proyek', 2),
(8272, 'Update User Req Deadline 30-11-2018', '2018-11-14 11:11:01', '6bmgy', 'proyek', 2),
(8273, 'Update User Req Deadline 13-11-2018', '2018-11-14 11:11:21', '6bmgy', 'proyek', 2),
(8274, 'SPK dihapus [ID: 12]', '2018-11-14 11:13:00', '6bmgy', '', 0),
(8275, 'SPK dihapus [ID: 10]', '2018-11-14 11:13:07', '6bmgy', '', 0),
(8276, 'SPK baru [ Nama: gggg]', '2018-11-14 11:14:18', '6bmgy', 'spk', 1),
(8277, 'SPK baru [ Nama: jjjj]', '2018-11-14 11:15:52', '6bmgy', 'spk', 1),
(8278, 'SPK dihapus [ID: 14]', '2018-11-14 11:16:08', '6bmgy', '', 0),
(8279, 'SPK dihapus [ID: 13]', '2018-11-14 11:16:15', '6bmgy', '', 0),
(8280, 'SPK baru [ Nama: Pekerjaan Pengawasan Pembangunan Gedung KPw BI Provinsi Gorontal]', '2018-11-14 15:37:20', 'n8950', 'spk', 1),
(8281, 'SPK baru [ Nama: Pekerjaan Pengawasan Pembangunan Gedung KPw BI Provinsi Gorontal]', '2018-11-14 15:43:20', 'n8950', 'spk', 1),
(8282, 'SPK baru [ Nama: Pekerjaan Perancangan Pembangunan Gedung KPw BI Provinsi Bangka Belitung]', '2018-11-14 15:46:29', 'n8950', 'spk', 1),
(8283, 'Revisi baru [ Modul: proyek]', '2018-11-14 17:17:17', 'n8950', '', 0),
(8284, 'SPK dihapus [ID: 9]', '2018-11-15 04:12:15', '6bmgy', '', 0),
(8285, 'SPK baru [ Nama: Pekerjaan Perancangan Pembangunan Gedung KPw BI Provinsi Bangka Belitung]', '2018-11-15 04:14:36', '6bmgy', 'spk', 1),
(8286, 'proyek baru', '2018-11-15 18:45:47', 'xfo7m', 'proyek', 1),
(8287, 'SPK baru [ Nama: Pekerjaan Pembangunan Gedung KPw BI Provinsi Papua]', '2018-11-16 08:15:26', 'n8950', 'spk', 1),
(8288, 'Revisi baru [ Modul: proyek]', '2018-11-16 08:20:40', 'xfo7m', '', 0),
(8289, 'SPK baru [ Nama: aaaa]', '2018-11-16 08:30:06', '6bmgy', 'spk', 1),
(8290, 'SPK baru [ Nama: aaaa]', '2018-11-16 08:55:06', '6bmgy', 'spk', 1),
(8291, 'SPK baru [ Nama: aaa]', '2018-11-16 08:56:28', '6bmgy', 'spk', 1),
(8292, 'SPK baru [ Nama: bbbb]', '2018-11-16 09:01:08', '6bmgy', 'spk', 1),
(8293, 'SPK baru [ Nama: Pekerjaan Pembangunan Gedung KPw BI Provinsi Papua]', '2018-11-16 09:43:28', 'n8950', 'spk', 1),
(8294, 'SPK baru [ Nama: Pembangunan Gedung KPw BI Provinsi Gorontalo]', '2018-11-16 10:19:56', 'xfo7m', 'spk', 1),
(8295, 'proyek Update [ID: 3]', '2018-11-16 10:51:45', '6bmgy', 'proyek', 2),
(8296, 'proyek Update [ID: 2]', '2018-11-16 10:52:22', '6bmgy', 'proyek', 2),
(8297, 'proyek Update [ID: 3]', '2018-11-16 10:59:12', '6bmgy', 'proyek', 2),
(8298, 'proyek Update [ID: 1]', '2018-11-16 10:59:39', '6bmgy', 'proyek', 2),
(8299, 'proyek Update [ID: 1]', '2018-11-16 10:59:49', '6bmgy', 'proyek', 2),
(8300, 'proyek Update [ID: 2]', '2018-11-16 11:01:42', '6bmgy', 'proyek', 2),
(8301, 'proyek Update [ID: 4]', '2018-11-16 11:01:49', '6bmgy', 'proyek', 2),
(8302, 'proyek Update [ID: 4]', '2018-11-16 11:02:23', '6bmgy', 'proyek', 2),
(8303, 'proyek Update [ID: 4]', '2018-11-16 11:04:11', '6bmgy', 'proyek', 2),
(8304, 'proyek Update [ID: 4]', '2018-11-16 11:04:19', '6bmgy', 'proyek', 2),
(8305, 'proyek Update [ID: 3]', '2018-11-16 11:04:57', '6bmgy', 'proyek', 2),
(8306, 'proyek Update [ID: 1]', '2018-11-16 11:05:50', '6bmgy', 'proyek', 2),
(8307, 'proyek Update [ID: 2]', '2018-11-16 11:06:06', '6bmgy', 'proyek', 2),
(8308, 'proyek Update [ID: 2]', '2018-11-16 11:06:36', '6bmgy', 'proyek', 2),
(8309, 'proyek Update [ID: 1]', '2018-11-16 11:07:10', '6bmgy', 'proyek', 2),
(8310, 'proyek Update [ID: 2]', '2018-11-16 11:07:24', '6bmgy', 'proyek', 2),
(8311, 'SPK dihapus [ID: 20]', '2018-11-16 11:10:34', '6bmgy', '', 0),
(8312, 'SPK dihapus [ID: 21]', '2018-11-16 11:10:37', '6bmgy', '', 0),
(8313, 'proyek baru', '2018-11-16 11:13:43', '6bmgy', 'proyek', 1),
(8314, 'SPK baru [ Nama: aaaa]', '2018-11-16 11:14:08', '6bmgy', 'spk', 1),
(8315, 'SPK baru [ Nama: bbb]', '2018-11-16 11:15:13', '6bmgy', 'spk', 1),
(8316, 'SPK dihapus [ID: 23]', '2018-11-16 11:24:02', '6bmgy', '', 0),
(8317, 'SPK baru [ Nama: aaaaa111]', '2018-11-16 11:27:26', '6bmgy', 'spk', 1),
(8318, 'SPK baru [ Nama: bbb1]', '2018-11-16 11:29:23', '6bmgy', 'spk', 1),
(8319, 'SPK dihapus [ID: 25]', '2018-11-16 11:31:59', '6bmgy', '', 0),
(8320, 'SPK baru [ Nama: cccc]', '2018-11-16 11:32:19', '6bmgy', 'spk', 1),
(8321, 'SPK baru [ Nama: ffff]', '2018-11-16 11:33:04', '6bmgy', 'spk', 1),
(8322, 'SPK dihapus [ID: 27]', '2018-11-16 11:35:21', '6bmgy', '', 0),
(8323, 'SPK dihapus [ID: 26]', '2018-11-16 11:35:25', '6bmgy', '', 0),
(8324, 'Anggaran dihapus [ID: 7]', '2018-11-16 13:02:05', '6bmgy', 'anggaran_investasi', 3),
(8325, 'Anggaran baru', '2018-11-16 13:42:42', '6bmgy', 'anggaran_investasi', 1),
(8326, 'Anggaran baru', '2018-11-16 13:44:00', '6bmgy', 'anggaran_investasi', 1),
(8327, 'Anggaran baru', '2018-11-16 13:48:21', '6bmgy', 'anggaran_investasi', 1),
(8328, 'Anggaran Update [ID: 11]', '2018-11-16 13:52:31', '6bmgy', 'anggaran_investasi', 2),
(8329, 'Anggaran Update [ID: 11]', '2018-11-16 13:52:46', '6bmgy', 'anggaran_investasi', 2),
(8330, 'Anggaran Update [ID: 11]', '2018-11-16 13:53:11', '6bmgy', 'anggaran_investasi', 2),
(8331, 'Anggaran dihapus [ID: 11]', '2018-11-16 13:56:07', '6bmgy', 'anggaran_investasi', 3),
(8332, 'Anggaran dihapus [ID: 4]', '2018-11-16 13:56:22', '6bmgy', 'anggaran_investasi', 3),
(8333, 'Anggaran Update [ID: 12]', '2018-11-16 13:57:05', '6bmgy', 'anggaran_investasi', 2),
(8334, 'Anggaran Update [ID: 12]', '2018-11-16 14:09:46', '6bmgy', 'anggaran_investasi', 2),
(8335, 'Anggaran dihapus [ID: 12]', '2018-11-16 14:47:58', 'n8950', 'anggaran_investasi', 3),
(8336, 'SPK baru [ Nama: Pembangunan Gedung KPw BI Provinsi Gorontalo]', '2018-11-16 15:03:27', 'n8950', 'spk', 1),
(8337, 'SPK baru [ Nama: Pekerjaan Pembangunan Gedung KPw BI Provinsi Papua]', '2018-11-16 15:59:13', 'n8950', 'spk', 1),
(8338, 'proyek Update [ID: 5]', '2018-11-16 16:25:05', '6bmgy', 'proyek', 2),
(8339, 'SPK baru [ Nama: Pembangunan Gedung KPw BI Provinsi Babel]', '2018-11-16 16:43:01', 'n8950', 'spk', 1),
(8340, 'proyek baru', '2018-11-16 17:42:15', 'n8950', 'proyek', 1),
(8341, 'proyek Update [ID: 4]', '2018-11-16 17:43:08', 'n8950', 'proyek', 2),
(8342, 'proyek baru', '2018-11-16 17:43:52', 'n8950', 'proyek', 1),
(8343, 'User baru [ Nama: Maseska]', '2018-11-16 17:45:43', 'n8950', '', 0),
(8344, 'proyek baru', '2018-11-16 17:48:42', 'mtjx8', 'proyek', 1),
(8345, 'Update User Req Deadline ', '2018-11-16 17:49:06', 'mtjx8', 'proyek', 2),
(8346, 'Update User Req Deadline ', '2018-11-16 17:49:09', 'mtjx8', 'proyek', 2),
(8347, 'Update User Req Deadline ', '2018-11-16 17:49:11', 'mtjx8', 'proyek', 2),
(8348, 'Update User Req Deadline ', '2018-11-16 17:49:12', 'mtjx8', 'proyek', 2),
(8349, 'SPK baru [ Nama: Pekerjaan Renovasi Rumah Jabatan Kepala KPwBI Balikpapan]', '2018-11-16 17:51:42', 'mtjx8', 'spk', 1),
(8350, 'Anggaran Update [ID: 13]', '2018-11-16 20:12:38', '6bmgy', 'anggaran_investasi', 2),
(8351, 'Anggaran Update [ID: 13]', '2018-11-16 20:16:43', '6bmgy', 'anggaran_investasi', 2),
(8352, 'Anggaran Update [ID: 13]', '2018-11-16 20:17:47', '6bmgy', 'anggaran_investasi', 2),
(8353, 'SPK baru [ Nama: Pelaksanaan Pekerjaan Renovasi dan Perluasan Gedung KPwBI Provinsi Sulawesi Selatan]', '2018-11-16 20:19:41', 'mtjx8', 'spk', 1),
(8354, 'SPK baru [ Nama: Pelaksanaan Pekerjaan Renovasi dan Perluasan Gedung KPwBI Provinsi Sulawesi Selatan]', '2018-11-16 20:20:05', 'mtjx8', 'spk', 1),
(8355, 'SPK baru [ Nama: Pelaksanaan Pekerjaan Renovasi dan Perluasan Gedung KPwBI Provinsi Sulawesi Selatan]', '2018-11-16 20:21:39', 'mtjx8', 'spk', 1),
(8356, 'SPK baru [ Nama: Pelaksanaan Rumah Jabatan Kepala Perwakilan Provinsi Bali]', '2018-11-16 20:27:26', 'xfo7m', 'spk', 1),
(8357, 'Anggaran dihapus [ID: 5]', '2018-11-16 20:30:11', '6bmgy', 'anggaran_investasi', 3),
(8358, 'proyek baru', '2018-11-16 20:47:23', 'mtjx8', 'proyek', 1),
(8359, 'proyek Update [ID: 9]', '2018-11-16 20:48:03', 'mtjx8', 'proyek', 2),
(8360, 'Anggaran dihapus [ID: 13]', '2018-11-16 20:52:43', '6bmgy', 'anggaran_investasi', 3),
(8361, 'SPK baru [ Nama: Pekerjaan Pembangunan Gedung KPwBI Provinsi Banten]', '2018-11-16 20:54:56', 'mtjx8', 'spk', 1),
(8362, 'proyek baru', '2018-11-16 21:01:43', 'xfo7m', 'proyek', 1),
(8363, 'proyek baru', '2018-11-16 21:10:43', 'mtjx8', 'proyek', 1),
(8364, 'SPK baru [ Nama: Pembangunan Rumah Jabatan Kepala Perwakilan Bank Indonesia Balikpapan]', '2018-11-16 21:13:31', 'xfo7m', 'spk', 1),
(8365, 'Anggaran dihapus [ID: 16]', '2018-11-16 21:13:36', '6bmgy', 'anggaran_investasi', 3),
(8366, 'SPK baru [ Nama: Pekerjaan Pembangunan Gedung KPwBI Provinsi Banten]', '2018-11-16 21:17:09', 'mtjx8', 'spk', 1),
(8367, 'Anggaran dihapus [ID: 15]', '2018-11-16 21:19:37', '6bmgy', 'anggaran_investasi', 3),
(8368, 'SPK baru [ Nama: Pembangunan Rumah Jabatan Kepala KPwBI Provinsi NTT]', '2018-11-16 21:20:03', 'mtjx8', 'spk', 1),
(8369, 'SPK baru [ Nama: Pembangunan Rumah Jabatan Kepala KPwBI Provinsi NTT]', '2018-11-16 21:20:15', 'mtjx8', 'spk', 1),
(8370, 'Anggaran Update [ID: 17]', '2018-11-16 21:20:24', '6bmgy', 'anggaran_investasi', 2),
(8371, 'Anggaran dihapus [ID: 17]', '2018-11-16 21:20:51', '6bmgy', 'anggaran_investasi', 3),
(8372, 'SPK baru [ Nama: Pembangunan Rumah Jabatan Kepala KPwBI Provinsi NTT]', '2018-11-16 21:21:36', 'mtjx8', 'spk', 1),
(8373, 'proyek Update [ID: 11]', '2018-11-16 21:33:49', 'mtjx8', 'proyek', 2),
(8374, 'proyek baru', '2018-11-16 21:41:04', 'mtjx8', 'proyek', 1),
(8375, 'SPK baru [ Nama: Pembangunan 4 unit Rumah Bank Indonesia (RBI) di KPwBI Provinsi Gorontalo]', '2018-11-16 21:51:26', 'mtjx8', 'spk', 1),
(8376, 'SPK baru [ Nama: Pembangunan 4 unit Rumah Bank Indonesia (RBI) di KPwBI Provinsi Gorontalo]', '2018-11-16 22:00:03', 'mtjx8', 'spk', 1),
(8377, 'SPK baru [ Nama: Pembangunan 4 unit Rumah Bank Indonesia (RBI) di KPwBI Provinsi Gorontalo]', '2018-11-16 22:01:13', 'mtjx8', 'spk', 1),
(8378, 'proyek baru', '2018-11-16 22:17:41', 'mtjx8', 'proyek', 1),
(8379, 'SPK baru [ Nama: Pekerjaan Pembangunan Gudang Penyimpanan Inventaris di Komplek RDBI Solo]', '2018-11-16 22:25:33', 'mtjx8', 'spk', 1),
(8380, 'proyek baru', '2018-11-16 22:40:14', 'mtjx8', 'proyek', 1),
(8381, 'proyek Update [ID: 13]', '2018-11-16 22:40:30', 'mtjx8', 'proyek', 2),
(8382, 'proyek Update [ID: 14]', '2018-11-16 22:48:31', 'mtjx8', 'proyek', 2),
(8383, 'proyek Update [ID: 14]', '2018-11-16 22:50:18', 'mtjx8', 'proyek', 2),
(8384, 'SPK baru [ Nama: Pengadaan Perabot Non Logam Gedung 4 KPwBI (Gorontalo, Bangka Belitung, Sulawesi Selatan dan Papua)]', '2018-11-16 22:54:18', 'mtjx8', 'spk', 1),
(8385, 'SPK baru [ Nama: Pengadaan Perabot Non Logam Gedung 4 KPwBI (Gorontalo, Bangka Belitung, Sulawesi Selatan dan Papua)]', '2018-11-16 22:55:34', 'mtjx8', 'spk', 1),
(8386, 'SPK baru [ Nama: Pengadaan Perabot Non Logam Gedung 4 KPwBI (Gorontalo, Bangka Belitung, Sulawesi Selatan dan Papua)]', '2018-11-16 22:55:44', 'mtjx8', 'spk', 1),
(8387, 'User baru [ Nama: Rezky Refyandini]', '2018-11-17 11:33:16', 'mtjx8', '', 0),
(8388, 'proyek baru', '2018-11-17 12:25:52', 'n306l', 'proyek', 1),
(8389, 'Update User Req Deadline ', '2018-11-17 12:27:59', 'n306l', 'proyek', 2),
(8390, 'Update User Req Deadline ', '2018-11-17 12:29:36', 'n306l', 'proyek', 2),
(8391, 'SPK baru [ Nama: pelaksanaan Pekerjaan Pengadaan Alat Angkut (Narrow Aisle/Reach Truck) untuk Sistem Racking di KPwBI Provinsi Kepulauan Bangka Belitung, Provinsi Gorontalo, Provinsi Papua dan Sulawesi Selatan]', '2018-11-17 12:48:56', 'n306l', 'spk', 1),
(8392, 'proyek Update [ID: 15]', '2018-11-17 12:49:54', 'n306l', 'proyek', 2),
(8393, 'proyek Update [ID: 15]', '2018-11-17 12:50:30', 'n306l', 'proyek', 2),
(8394, 'proyek baru', '2018-11-17 12:52:41', 'n306l', 'proyek', 1),
(8395, 'SPK baru [ Nama: Pengadaan Alat Angkut (Walkie Truck/Electric Lift Hand Pallet) untuk Sistem Racking di KPwBI Provinsi Kalimantan Utara]', '2018-11-17 13:11:58', 'n306l', 'spk', 1),
(8396, 'proyek baru', '2018-11-17 13:18:32', 'n306l', 'proyek', 1),
(8397, 'proyek Update [ID: 17]', '2018-11-17 13:19:17', 'n306l', 'proyek', 2),
(8398, 'SPK baru [ Nama: Pekerjaan Pengadaan Kontainer Transparan Uang Kerta dan Uang Logam untuk Gedung KPwBI Provinsi Kep Bangka Belitung, Provinsi Gorontalo, Provinsi Papua, Provinsi Sulawesi Tengah dan Cirebon]', '2018-11-17 13:45:57', 'n306l', 'spk', 1),
(8399, 'SPK baru [ Nama: Pekerjaan Renovasi Rumah Jabatan Kepala KPwBI Balikpapan]', '2018-11-17 14:47:15', 'xfo7m', 'spk', 1),
(8400, 'proyek baru', '2018-11-17 14:55:30', 'n306l', 'proyek', 1),
(8401, 'proyek Update [ID: 18]', '2018-11-17 14:55:48', 'n306l', 'proyek', 2),
(8402, 'SPK baru [ Nama: Pekerjaan Pengadaan Alat Angkut (Narrow Aisle) untuk Sistem racking KPwBI Provisi Banten]', '2018-11-17 15:00:07', 'n306l', 'spk', 1),
(8403, 'proyek Update [ID: 16]', '2018-11-17 15:20:05', 'n306l', 'proyek', 2),
(8404, 'SPK baru [ Nama: Pengadaan Alat Angkut (Walkie Truck/Electric Lift Hand Pallet) untuk Sistem Racking di KPwBI Provinsi Kalimantan Utara]', '2018-11-17 15:27:23', 'n306l', 'spk', 1),
(8405, 'proyek baru', '2018-11-23 13:33:41', '6bmgy', 'proyek', 1),
(8406, 'Update User Req Deadline 30-11-2018', '2018-11-23 13:35:58', '6bmgy', 'proyek', 2),
(8407, 'Update User Req Deadline ', '2018-11-23 13:36:02', '6bmgy', 'proyek', 2),
(8408, 'Update User Req Deadline 26-11-2018', '2018-11-23 13:36:08', '6bmgy', 'proyek', 2),
(8409, 'Update User Req Deadline 30-11-2018', '2018-11-23 13:36:09', '6bmgy', 'proyek', 2),
(8410, 'SPK baru [ Nama: aplikasi]', '2018-11-26 13:11:55', '6bmgy', 'spk', 1),
(8411, 'SPK baru [ Nama: aplikasi]', '2018-11-26 13:32:51', '6bmgy', 'spk', 1),
(8412, 'SPK baru [ Nama: aplikasi]', '2018-11-26 13:35:22', '6bmgy', 'spk', 1),
(8413, 'SPK baru [ Nama: aplikasi]', '2018-11-26 13:35:34', '6bmgy', 'spk', 1),
(8414, 'Update User Req Deadline 09-11-2018', '2018-11-26 13:36:38', '6bmgy', 'proyek', 2),
(8415, 'Update User Req Deadline 14-11-2018', '2018-11-26 13:36:40', '6bmgy', 'proyek', 2),
(8416, 'SPK baru [ Nama: aaaa]', '2018-11-26 13:40:27', '6bmgy', 'spk', 1),
(8417, 'SPK baru [ Nama: aaaa]', '2018-11-26 13:41:50', '6bmgy', 'spk', 1),
(8418, 'User baru [ Nama: Demo]', '2018-11-27 11:42:34', '6bmgy', '', 0),
(8419, 'User baru [ Nama: Demo]', '2018-11-27 11:44:22', '6bmgy', '', 0),
(8420, 'Failed Login Attempt [Email:sigit.mego@gmail.com, IP:182.253.176.113]', '2018-11-30 04:10:53', 'NLI', '', 0),
(8421, 'Update User Req Deadline ', '2019-03-22 18:12:12', '6bmgy', 'proyek', 2),
(8422, 'Update User Req Deadline ', '2019-03-22 18:12:13', '6bmgy', 'proyek', 2),
(8423, 'Update User Req Deadline ', '2019-03-22 18:12:14', '6bmgy', 'proyek', 2),
(8424, 'Update User Req Deadline ', '2019-03-22 18:12:15', '6bmgy', 'proyek', 2),
(8425, 'Failed Login Attempt [Email:ocfirstgm@gmail.com, IP:182.0.230.152]', '2019-03-25 02:41:18', 'NLI', '', 0),
(8426, 'User baru [ Nama: Ocfirst A]', '2019-03-25 08:51:57', 'n8950', '', 0),
(8427, 'proyek baru', '2019-09-13 14:43:19', 'n8950', 'proyek', 1),
(8428, 'proyek baru', '2019-09-13 14:44:03', 'n8950', 'proyek', 1),
(8429, 'Update User Req Deadline ', '2019-09-13 14:44:35', 'n8950', 'proyek', 2),
(8430, 'Update User Req Deadline ', '2019-09-13 14:44:41', 'n8950', 'proyek', 2),
(8431, 'SPK baru [ Nama: Pekerjaan Penggantian Peralatan Mekanikal Elektrikal Gedung KPwBI Balikpapan]', '2019-09-13 14:45:15', 'n8950', 'spk', 1),
(8432, 'User baru [ Nama: Trio Puji A]', '2019-09-13 15:07:37', 'n8950', '', 0),
(8433, 'Failed Login Attempt [Email:dinar_pp@bi.go.id, IP:182.0.197.20]', '2019-12-20 09:02:16', 'NLI', '', 0),
(8434, 'Failed Login Attempt [Email:dinar_pp@bi.go.id, IP:182.0.228.146]', '2020-01-29 05:36:16', 'NLI', '', 0),
(8435, 'User baru [ Nama: Test]', '2020-08-31 07:58:59', '6bmgy', '', 0),
(8436, 'Role baru [ Nama: aaaaa]', '2021-08-20 13:46:07', '6bmgy', '', 0),
(8437, 'User baru [ Nama: Admin]', '2021-08-20 13:46:46', '6bmgy', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id_anggaran` int(10) NOT NULL,
  `thn_anggaran` int(4) NOT NULL,
  `nominal_anggaran` decimal(60,0) NOT NULL,
  `real_anggaran` decimal(60,0) NOT NULL,
  `guna_anggaran` decimal(60,0) NOT NULL,
  `rguna_anggaran` decimal(60,0) NOT NULL,
  `tipe_anggaran` int(11) NOT NULL,
  `ts_anggaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `thn_anggaran`, `nominal_anggaran`, `real_anggaran`, `guna_anggaran`, `rguna_anggaran`, `tipe_anggaran`, `ts_anggaran`) VALUES
(14, 2018, '432769857316', '294120200000', '0', '0', 1, '2018-11-16 20:49:18'),
(18, 2018, '9787341850', '5633000000', '0', '0', 2, '2018-11-16 21:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_detail`
--

CREATE TABLE `anggaran_detail` (
  `id_anggaran_detail` int(20) NOT NULL,
  `anggaran_id_detail` int(20) NOT NULL,
  `tipe_anggaran_detail` int(2) NOT NULL,
  `bulan_anggaran_detail` int(2) NOT NULL,
  `pkat_anggaran_detail` decimal(40,2) NOT NULL,
  `real_anggaran_detail` decimal(40,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggaran_detail`
--

INSERT INTO `anggaran_detail` (`id_anggaran_detail`, `anggaran_id_detail`, `tipe_anggaran_detail`, `bulan_anggaran_detail`, `pkat_anggaran_detail`, `real_anggaran_detail`) VALUES
(61, 14, 1, 1, '775200000.00', '770200000.00'),
(62, 14, 1, 2, '101615854142.00', '200000000.00'),
(63, 14, 1, 3, '3838967919.00', '3650000000.00'),
(64, 14, 1, 4, '127518473918.00', '120000000000.00'),
(65, 14, 1, 5, '82671981595.00', '80000000000.00'),
(66, 14, 1, 6, '33626618326.00', '34000000000.00'),
(67, 14, 1, 7, '7931349821.00', '7500000000.00'),
(68, 14, 1, 8, '12831438041.00', '10000000000.00'),
(69, 14, 1, 9, '32505315273.00', '29000000000.00'),
(70, 14, 1, 10, '9875625000.00', '9000000000.00'),
(71, 14, 1, 11, '8140432719.00', '0.00'),
(72, 14, 1, 12, '11438600562.00', '0.00'),
(85, 17, 2, 1, '20000000.00', '100000000.00'),
(86, 17, 2, 2, '1000000.00', '0.00'),
(87, 17, 2, 3, '0.00', '0.00'),
(88, 17, 2, 4, '0.00', '0.00'),
(89, 17, 2, 5, '0.00', '0.00'),
(90, 17, 2, 6, '0.00', '0.00'),
(91, 17, 2, 7, '0.00', '0.00'),
(92, 17, 2, 8, '0.00', '0.00'),
(93, 17, 2, 9, '0.00', '0.00'),
(94, 17, 2, 10, '0.00', '0.00'),
(95, 17, 2, 11, '0.00', '0.00'),
(96, 17, 2, 12, '0.00', '0.00'),
(97, 18, 2, 1, '274776000.00', '275000000.00'),
(98, 18, 2, 2, '364742000.00', '300000000.00'),
(99, 18, 2, 3, '457272000.00', '350000000.00'),
(100, 18, 2, 4, '1283312000.00', '728000000.00'),
(101, 18, 2, 5, '502757450.00', '510000000.00'),
(102, 18, 2, 6, '1578736000.00', '740000000.00'),
(103, 18, 2, 7, '474902000.00', '480000000.00'),
(104, 18, 2, 8, '707192000.00', '750000000.00'),
(105, 18, 2, 9, '924681600.00', '760000000.00'),
(106, 18, 2, 10, '707192000.00', '740000000.00'),
(107, 18, 2, 11, '715192000.00', '0.00'),
(108, 18, 2, 12, '1796586800.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(10) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `tipe_event` int(1) NOT NULL,
  `kategori_event` int(5) NOT NULL,
  `mulai_event` datetime NOT NULL,
  `selesai_event` datetime NOT NULL,
  `ket_event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tipe_event`, `kategori_event`, `mulai_event`, `selesai_event`, `ket_event`) VALUES
(1, 'Tahun Baru 2019', 0, 1, '2019-01-01 00:00:00', '0000-00-00 00:00:00', 'aaaaaa123'),
(2, 'Tahun Baru Imlek 2570 Kongzili', 0, 1, '2019-02-05 00:00:00', '0000-00-00 00:00:00', ''),
(3, 'Hari Raya Nyepi Tahun Baru Saka 1941', 0, 1, '2019-03-07 00:00:00', '0000-00-00 00:00:00', ''),
(4, 'Isra Mikraj Nabi Muhammad SAW', 0, 3, '2019-04-03 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'Wafat Isa Al Masih', 0, 1, '2019-04-19 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Hari Buruh Internasional', 0, 1, '2019-05-01 00:00:00', '0000-00-00 00:00:00', ''),
(7, 'Hari Raya Waisak 2563', 0, 1, '2019-05-19 00:00:00', '0000-00-00 00:00:00', ''),
(8, 'Kenaikan Isa Almasih', 0, 1, '2019-05-30 00:00:00', '0000-00-00 00:00:00', ''),
(9, 'Hari Lahir Pancasila', 0, 1, '2019-06-01 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_ke` int(10) NOT NULL,
  `nama_ke` varchar(100) NOT NULL,
  `warna_ke` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id_ke`, `nama_ke`, `warna_ke`) VALUES
(1, 'Libur Nasional', '#ff0000'),
(2, 'Rakor', '#8000ff'),
(3, 'Cuti Bersama', '#ff3e43');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(20) NOT NULL,
  `pesan_notifikasi` varchar(100) NOT NULL,
  `link_notifikasi` varchar(100) NOT NULL,
  `dari_notifikasi` varchar(10) NOT NULL,
  `user_notifikasi` varchar(10) NOT NULL,
  `baca_notifikasi` int(1) NOT NULL,
  `create_notifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `pesan_notifikasi`, `link_notifikasi`, `dari_notifikasi`, `user_notifikasi`, `baca_notifikasi`, `create_notifikasi`) VALUES
(250, 'Revisi laporan baru', 'revisi/detail/89', 'n8950', 'duji9', 0, '2018-11-14 10:17:17'),
(251, 'Revisi laporan baru', 'revisi/detail/90', 'xfo7m', 'duji9', 0, '2018-11-16 01:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id_progress` int(20) NOT NULL,
  `tipe_progress` int(1) NOT NULL,
  `proyek_id_progress` int(20) NOT NULL,
  `spk_id_progress` int(20) NOT NULL,
  `detail_progress` varchar(200) NOT NULL,
  `persen_progress` decimal(7,4) NOT NULL,
  `real_progress` decimal(8,4) NOT NULL,
  `tgl_progress` date NOT NULL,
  `approval_progress` date NOT NULL,
  `bayar_progress` date NOT NULL,
  `bayar_persen_progress` float(8,4) NOT NULL,
  `nominal_bayar_progress` decimal(60,2) NOT NULL,
  `rek_progress` varchar(100) NOT NULL,
  `file_progress` varchar(100) NOT NULL,
  `status_progress` int(1) NOT NULL,
  `deviasi_progress` float(7,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id_progress`, `tipe_progress`, `proyek_id_progress`, `spk_id_progress`, `detail_progress`, `persen_progress`, `real_progress`, `tgl_progress`, `approval_progress`, `bayar_progress`, `bayar_persen_progress`, `nominal_bayar_progress`, `rek_progress`, `file_progress`, `status_progress`, `deviasi_progress`) VALUES
(25, 3, 4, 18, 'Prestasi 10%', '10.0000', '14.0000', '2017-08-18', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 4.0000),
(26, 3, 3, 22, 'Prestasi 10%', '10.0000', '10.0000', '2017-05-19', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(27, 3, 3, 22, 'Prestasi 15% ', '5.0000', '16.0000', '2017-07-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 1.0000),
(28, 3, 3, 22, 'Prestasi 20%', '5.0000', '19.0000', '2017-07-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -1.0000),
(29, 3, 3, 22, 'Prestasi 30%', '10.0000', '25.0000', '2017-08-19', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(30, 3, 3, 22, 'Prestasi 40%', '10.0000', '35.0000', '2017-09-28', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(31, 3, 3, 22, 'Prestasi 45%', '5.0000', '46.0000', '2017-11-03', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 1.0000),
(32, 3, 3, 22, 'Prestasi 60%', '15.0000', '60.0000', '2017-12-07', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(33, 3, 3, 22, 'Prestasi 70%', '10.0000', '73.0000', '2018-01-23', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 3.0000),
(36, 3, 4, 18, 'Prestasi 15%', '5.0000', '17.0000', '2017-09-09', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 2.0000),
(38, 3, 4, 18, 'Prestasi 20%', '5.0000', '25.0000', '2017-10-14', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 5.0000),
(39, 3, 4, 18, 'Prestasi 30%', '10.0000', '29.0000', '2017-12-22', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -1.0000),
(40, 3, 4, 18, 'Prestasi 40%', '10.0000', '35.0000', '2018-02-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(41, 3, 4, 18, 'Prestasi 45%', '5.0000', '40.0000', '2018-03-31', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(42, 3, 4, 18, 'Prestasi 60%', '15.0000', '58.0000', '2018-04-28', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -2.0000),
(43, 3, 4, 18, 'Prestasi 70%', '10.0000', '65.0000', '2018-09-14', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(44, 3, 4, 18, 'Prestasi 80%', '10.0000', '77.0000', '2018-10-10', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -3.0000),
(45, 3, 4, 18, 'Prestasi 90%', '10.0000', '92.0000', '2018-11-23', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 2.0000),
(46, 3, 4, 18, 'Prestasi 100%', '10.0000', '92.0000', '2018-12-17', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -8.0000),
(47, 3, 3, 22, 'Prestasi 100%', '30.0000', '100.0000', '2018-05-28', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(48, 3, 2, 28, 'Prestasi 10%', '10.0000', '7.0000', '2017-05-17', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -3.0000),
(49, 3, 2, 28, 'Prestasi 100%', '10.0000', '100.0000', '2018-05-31', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(50, 3, 2, 28, 'Prestasi 20%', '10.0000', '14.0000', '2017-06-13', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -6.0000),
(51, 3, 2, 28, 'Prestasi 30%', '10.0000', '21.0000', '2017-07-21', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -9.0000),
(52, 3, 2, 28, 'Prestasi 40%', '10.0000', '35.0000', '2017-08-09', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(53, 3, 2, 28, 'Prestasi 50%', '10.0000', '51.0000', '2017-09-18', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 1.0000),
(54, 3, 2, 28, 'Prestasi 60%', '10.0000', '55.0000', '2017-11-23', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(55, 3, 2, 28, 'Prestasi 70%', '10.0000', '65.0000', '2018-01-10', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(56, 3, 2, 28, 'Prestasi 80%', '10.0000', '79.0000', '2018-03-05', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -1.0000),
(57, 3, 2, 28, 'Prestasi 90%', '10.0000', '92.0000', '2018-04-04', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 2.0000),
(61, 3, 6, 30, 'Prestasi 10%', '10.0000', '15.0000', '2016-04-11', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 5.0000),
(62, 3, 6, 30, 'Prestasi 20%', '10.0000', '30.0000', '2016-06-13', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 10.0000),
(63, 3, 6, 30, 'Prestasi 30%', '10.0000', '43.0000', '2016-09-26', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 13.0000),
(64, 3, 6, 30, 'Prestasi 40%', '10.0000', '27.0000', '2016-11-07', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -13.0000),
(66, 3, 6, 30, 'Prestasi 100%', '10.0000', '98.0000', '2018-06-07', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -2.0000),
(67, 3, 6, 30, 'Prestasi 90%', '10.0000', '86.0000', '2018-04-16', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -4.0000),
(68, 3, 6, 30, 'Prestasi 80%', '10.0000', '75.0000', '2018-01-08', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(69, 3, 6, 30, 'Prestasi 70%', '10.0000', '66.0000', '2017-10-16', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -4.0000),
(70, 3, 6, 30, 'Prestasi 60%', '10.0000', '61.0000', '2017-07-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 1.0000),
(71, 3, 6, 30, 'Prestasi 50%', '10.0000', '52.0000', '2017-02-06', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 2.0000),
(72, 3, 1, 31, 'Prestasi 1%', '1.0000', '0.0000', '2016-07-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(73, 3, 1, 31, 'Prestasi 2%', '1.0000', '0.0000', '2016-08-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(74, 3, 1, 31, 'Prestasi 10%', '8.0000', '0.0000', '2016-09-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(75, 3, 1, 31, 'Prestasi 30%', '20.0000', '0.0000', '2016-10-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(76, 3, 1, 31, 'Prestasi 50%', '20.0000', '40.0000', '2016-11-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -10.0000),
(77, 3, 1, 31, 'Prestasi 70%', '20.0000', '54.0000', '2016-12-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -16.0000),
(78, 3, 1, 31, 'Prestasi 85%', '15.0000', '60.0000', '2017-01-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -25.0000),
(79, 3, 1, 31, 'Prestasi 95%', '10.0000', '80.0000', '2017-02-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -15.0000),
(80, 3, 1, 31, 'Prestasi 100%', '5.0000', '100.0000', '2017-03-16', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(91, 3, 11, 34, 'Prestasi 10%', '10.0000', '8.0000', '2018-02-26', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -2.0000),
(92, 3, 11, 34, 'Prestasi 100%', '10.0000', '94.0000', '2018-12-25', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -6.0000),
(93, 3, 11, 34, 'Prestasi 90%', '10.0000', '94.0000', '2018-11-26', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 4.0000),
(94, 3, 11, 34, 'Prestasi 20%', '10.0000', '15.0000', '2018-04-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(95, 3, 11, 34, 'Prestasi 30%', '10.0000', '32.0000', '2018-05-07', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 2.0000),
(96, 3, 11, 34, 'Prestasi 40%', '10.0000', '44.0000', '2018-06-25', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 4.0000),
(97, 3, 11, 34, 'Prestasi 50%', '10.0000', '54.0000', '2018-07-23', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 4.0000),
(98, 3, 11, 34, 'Prestasi 60%', '10.0000', '63.0000', '2018-08-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 3.0000),
(99, 3, 11, 34, 'Prestasi 70%', '10.0000', '73.0000', '2018-09-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 3.0000),
(100, 3, 11, 34, 'Prestasi 80%', '10.0000', '84.0000', '2018-10-29', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 4.0000),
(102, 3, 12, 35, 'Prestasi 100%', '10.0000', '96.0000', '2018-09-09', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -4.0000),
(103, 3, 12, 35, 'Prestasi 10%', '10.0000', '7.0000', '2018-01-01', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -3.0000),
(104, 3, 12, 35, 'Prestasi 20%', '10.0000', '17.0000', '2018-02-05', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -3.0000),
(105, 3, 12, 35, 'Prestasi 30%', '10.0000', '27.0000', '2018-03-05', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -3.0000),
(106, 3, 12, 35, 'Prestasi 40%', '10.0000', '38.0000', '2018-04-09', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -2.0000),
(107, 3, 12, 35, 'Prestasi 50%', '10.0000', '46.0000', '2018-05-07', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -4.0000),
(108, 3, 12, 35, 'Prestasi 60%', '10.0000', '57.0000', '2018-06-04', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -3.0000),
(109, 3, 12, 35, 'Prestasi 70%', '10.0000', '68.0000', '2018-07-09', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -2.0000),
(110, 3, 12, 35, 'Prestasi 80%', '10.0000', '76.0000', '2018-07-30', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -4.0000),
(111, 3, 12, 35, 'Prestasi 90%', '10.0000', '89.0000', '2018-08-13', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -1.0000),
(112, 3, 8, 29, 'Prestasi 1%', '1.0000', '1.0000', '2016-08-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(113, 3, 8, 29, 'Prestasi 2%', '1.0000', '2.0000', '2016-09-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(114, 3, 8, 29, 'Prestasi 10%', '8.0000', '9.0000', '2016-10-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -1.0000),
(115, 3, 8, 29, 'Prestasi 30%', '20.0000', '28.0000', '2016-11-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -2.0000),
(116, 3, 8, 29, 'Prestasi 50%', '20.0000', '40.0000', '2016-12-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -10.0000),
(117, 3, 8, 29, 'Prestasi 70%', '20.0000', '60.0000', '2017-01-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -10.0000),
(118, 3, 8, 29, 'Prestasi 85%', '15.0000', '80.0000', '2017-02-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(119, 3, 8, 29, 'Prestasi 90%', '15.0000', '90.0000', '2018-03-02', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -10.0000),
(125, 3, 14, 37, 'Fabrikasi 20%', '20.0000', '20.0000', '2018-03-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(127, 3, 14, 37, 'Fabrikasi 60%', '20.0000', '55.0000', '2018-04-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -5.0000),
(128, 3, 14, 37, 'Fabrikasi 80%', '20.0000', '80.0000', '2018-05-10', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(130, 3, 14, 37, 'Fabrikasi 40%', '20.0000', '45.0000', '2018-04-10', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 5.0000),
(131, 3, 14, 37, 'Fabrikasi 100% dan Instalasi', '20.0000', '100.0000', '2018-05-24', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(133, 3, 18, 41, 'Produksi telah selesai, menunggu baterai cadangan yang produksinya bermasalah karena kebakaran pabrik', '100.0000', '80.0000', '2018-09-27', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(135, 3, 17, 40, 'Pembuatan dan persetujuan mock up', '30.0000', '0.0000', '2018-12-15', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -30.0000),
(136, 3, 16, 39, 'Telah dilakukan pengiriman ke Kaltara', '100.0000', '100.0000', '2018-09-20', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(137, 3, 15, 38, 'Proses produksi dan approval modifikasi alat angkut', '20.0000', '20.0000', '1970-01-01', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(138, 3, 19, 42, 'Tahap 1', '25.0000', '24.0000', '2018-11-30', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, -1.0000),
(139, 3, 19, 42, 'Tahap 2', '75.0000', '0.0000', '2018-12-08', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(141, 2, 19, 43, 'Tahap 1', '50.0000', '49.0000', '2018-11-21', '2018-11-29', '2018-11-29', 0.0000, '4900000.00', '123', '', 1, -1.0000),
(142, 2, 19, 43, 'Tahap 2', '100.0000', '0.0000', '2018-12-15', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000),
(143, 3, 20, 44, '', '10.0000', '0.0000', '2019-08-28', '0000-00-00', '0000-00-00', 0.0000, '0.00', '', '', 0, 0.0000);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(20) NOT NULL,
  `tipe_proyek` int(5) NOT NULL,
  `nama_proyek` varchar(200) NOT NULL,
  `thn_anggaran_proyek` int(10) NOT NULL,
  `ud_proyek` date NOT NULL,
  `ui_proyek` date NOT NULL,
  `kd_proyek` date NOT NULL,
  `ki_proyek` date NOT NULL,
  `ud_pg_proyek` date NOT NULL,
  `ui_pg_proyek` date NOT NULL,
  `kd_pg_proyek` date NOT NULL,
  `ki_pg_proyek` date NOT NULL,
  `ud_pl_proyek` date NOT NULL,
  `ui_pl_proyek` date NOT NULL,
  `kd_pl_proyek` date NOT NULL,
  `ki_pl_proyek` date NOT NULL,
  `tahap_proyek` int(1) NOT NULL,
  `subtahap_proyek` int(1) NOT NULL,
  `status_proyek` int(1) NOT NULL,
  `selesai_proyek` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `tipe_proyek`, `nama_proyek`, `thn_anggaran_proyek`, `ud_proyek`, `ui_proyek`, `kd_proyek`, `ki_proyek`, `ud_pg_proyek`, `ui_pg_proyek`, `kd_pg_proyek`, `ki_pg_proyek`, `ud_pl_proyek`, `ui_pl_proyek`, `kd_pl_proyek`, `ki_pl_proyek`, `tahap_proyek`, `subtahap_proyek`, `status_proyek`, `selesai_proyek`) VALUES
(1, 2, 'Renovasi Rumah jabatan Kepala Perwakilan Dalam Negeri Provinsi Bali', 2018, '2018-11-06', '2015-06-24', '2015-07-31', '2015-07-31', '2018-11-13', '0000-00-00', '2018-11-21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2, 0, 0, 0),
(2, 1, 'Pembangunan Gedung KPw BI Provinsi Bangka Belitung', 2018, '2018-11-30', '2018-11-30', '0000-00-00', '0000-00-00', '2018-11-13', '0000-00-00', '0000-00-00', '0000-00-00', '2018-11-14', '2018-11-22', '2018-11-30', '0000-00-00', 0, 0, 0, 0),
(3, 1, 'Pembangunan Gedung KPw BI Provinsi Gorontalo', 2018, '2016-11-01', '2016-11-28', '2016-12-01', '2017-01-02', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0),
(4, 1, 'Renovasi Gedung KPw BI Provinsi Papua', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(6, 1, 'Renovasi dan Perluasan Khazanah KPwBI Provinsi Sulawesi Selatan', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(7, 1, 'Pembangunan Gedung KPwBI Provinsi Sulawesi Tenggara', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(8, 2, 'Renovasi Rumah Jabatan KPwBI Balikpapan', 2018, '1970-01-01', '1970-01-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', 0, 0, 0, 0),
(11, 2, 'Pembangunan Rumah Jabatan Kepala KPwBI Provinsi NTT', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(12, 2, 'Pembangunan 4 unit Rumah Bank Indonesia (RBI) di KPwBI Provinsi Gorontalo', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(14, 5, 'Pengadaan Perabot Non Logam Gedung 4 KPwBI (Gorontalo, Bangka Belitung, Sulawesi Selatan dan Papua)', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(15, 5, 'Pekerjaan Pengadaan Alat Angkut (Narrow Aisle/Reach Truck) untuk Sistem Racking di KPwBI Provinsi Kepulauan Bangka Belitung, Provinsi Gorontalo, Provinsi Papua dan Provinsi Sulawesi Selatan', 2018, '1970-01-01', '1970-01-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(16, 5, 'Pengadaan Alat Angkut (Walkie Truck/Electrric Hand Pallet) untuk Sistem Racking di KPwBI Provinsi Kalimantan Utara', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(17, 5, 'Pekerjaan Pengadaan Kontainer Transparan Uang Kertas dan Uang Logam untuk Gedung KPwBI Provinsi Kepulauan Bangka Belitung, Provinsi Gorontalo, Provinsi Papua, dan Provinsi Sulawesi Tengah dan Cirebon', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(18, 5, 'Pengadaan Alat Angkut (Narrow Aisle) untuk Sistem Racking KPwBI Provinsi Banten', 2018, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(19, 1, 'tes', 2018, '2018-11-26', '0000-00-00', '2018-11-30', '0000-00-00', '2018-11-09', '0000-00-00', '2018-11-14', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(20, 1, 'Pekerjaan Penggantian Peralatan Mekanikal Elektrikal Gedung KPwBI Balikpapan ', 2019, '1970-01-01', '0000-00-00', '1970-01-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_log`
--

CREATE TABLE `proyek_log` (
  `id_pl` int(10) NOT NULL,
  `proyek_id_pl` int(10) NOT NULL,
  `tgl_pl` date NOT NULL,
  `tipe_pl` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_log`
--

INSERT INTO `proyek_log` (`id_pl`, `proyek_id_pl`, `tgl_pl`, `tipe_pl`) VALUES
(1, 1, '2018-11-06', 1),
(2, 1, '2015-06-24', 2),
(3, 1, '2018-11-21', 3),
(4, 1, '2015-07-31', 4),
(5, 2, '2018-11-13', 1),
(6, 3, '2016-11-01', 1),
(7, 3, '2016-11-28', 2),
(8, 3, '2016-12-01', 3),
(9, 3, '2017-01-02', 4),
(10, 2, '2018-11-22', 2),
(11, 2, '2018-11-30', 3),
(12, 8, '1970-01-01', 1),
(13, 8, '1970-01-01', 2),
(14, 8, '1970-01-01', 3),
(15, 8, '1970-01-01', 4),
(16, 15, '1970-01-01', 1),
(17, 15, '1970-01-01', 2),
(18, 19, '2018-11-09', 1),
(19, 19, '2018-11-14', 3),
(20, 9, '1970-01-01', 1),
(21, 9, '1970-01-01', 2),
(22, 9, '1970-01-01', 4),
(23, 9, '1970-01-01', 3),
(24, 20, '1970-01-01', 3),
(25, 20, '1970-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_tipe`
--

CREATE TABLE `proyek_tipe` (
  `id_proyek_t` int(5) NOT NULL,
  `nama_proyek_t` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_tipe`
--

INSERT INTO `proyek_tipe` (`id_proyek_t`, `nama_proyek_t`) VALUES
(1, 'Gedung'),
(2, 'Rumah'),
(4, 'Bangunan Lain'),
(5, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pustaka`
--

CREATE TABLE `pustaka` (
  `id_pustaka` int(10) NOT NULL,
  `nama_pustaka` varchar(200) NOT NULL,
  `tipe_pustaka` int(10) NOT NULL,
  `kategori_pustaka` int(1) NOT NULL,
  `proyek_pustaka` int(20) NOT NULL,
  `spk_pustaka` int(20) NOT NULL,
  `file_pustaka` varchar(200) NOT NULL,
  `ket_pustaka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `id_revisi` int(6) NOT NULL,
  `modul_id` varchar(100) NOT NULL,
  `isi_revisi` text NOT NULL,
  `user_revisi` varchar(10) NOT NULL,
  `status_revisi` int(1) NOT NULL,
  `create_revisi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diselesaikan_revisi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisi`
--

INSERT INTO `revisi` (`id_revisi`, `modul_id`, `isi_revisi`, `user_revisi`, `status_revisi`, `create_revisi`, `tgl_diselesaikan_revisi`) VALUES
(89, 'proyek', '<p>yth. Mas Mego,</p><p>kami coba input data proyek (perancangan dan pengawasan) pembangunan gedung kpw bi gorontalo. kami telah input data perancangan (spk, timeline, progress). kemudian kami input pengawasan (spk, timeline, progress). hasil inputnya terdapat 2 error sbb:</p><p>1. ketika kami input data pengawas (progress) : data prgress perancang berubah sesuai data pengawas.</p><p><img src="data:image/png;base64,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qXjppZdiiy22KMeJEycW2QjYn/zJn8R9991XSBe5//RP/1TI3ac//elCxsi/+OKL493vfnchgogfec8880yR8ZOf/CT+7u/+rhAj5GiHHXaI//zP/4w5c+bET3/60zjllFPKNURyq622iv/6r/+KbbfdNv7lX/6lfNZm5Oroo4+OL3/5y2Xp9GMf+1ghheqJ1CGNX/jCF+Jd73rXoLDMTIlAIpAIJAJrB4FBLR0esP++MXOzzWLu9TfFCy8sjBdeeCGunntdbLftNrHNnNmxbNnyGNHSGsuWt62dWqWUDQ4BJOnQQw+NQw45pLRdpObrX/96ObfnnnsOiIf7zRxEq0StfvnLX8bZZ59diBHi8qMf/ajs/bKUePPNN8eJJ54Yn/3sZ0OUCBmR9thjjzjzzDPj/e9/fyFG5CBXn//850sk6pxzzikkCrFB/kToRLkQwp/97GelXNEoBEiU6phjjikRKnvGbrzxxkLwHH23Bw0x8rJg0acjjjiiRLhE5NTPsqmEHNlv5j6ETNnXXXddiZA5WloVgdMW915wwQVl+XT8+PHlfgQO0dtoo40CYazRxXIx/yUCiUAikAiscwQGFdG6+ZbbypLIqFEjSwRr1syZcfSRh5fK3XnX3bHrLjvFLjvtUCJcJ735jSFfpkRgdRFA5P/oj/6oEBIEonEJry+ZiM2SJUvi937v9wqZQGZExj73uc8VkoF4ISwLFiwohMNSmuW6O++8s5AdBOakk06KHXfcMQ4++OD4n//5n1i2bFk88MADZTnzH/7hH2LvvfcuxW+99dYhSibC9Du/8ztx+OGHx0UXXVTIHcInKqX8Aw88sJSFON11113lu/IsU1pKrPJEoTwE8K1vfassAVp6VDdJVO7cc88te80OOuig+N///d8SZXPtBz/4QVgW/I//+I+wvIhMaZ86qJt7EThJJMzyorqJumVKBBKBRCAReHUQGBTROvzQg+Lue+6LzWZMiy22mBULF764snazt94yNttsekyaODGOOPTgiMgfqF4JTn5YZQQQICTLHihEYueddx6UDNEsy4WW2SZPnlyiTDvttNPKvVmW1kSgRKlEdeylQpKmTp0a9957byEniJUkL7JSSZMj8iNZ4qw/rE2GPWAf/ehHC0HbfvvtyxIl0oZoiZAhP6effnqJjJ188sklOva9730vRJw8VUmW86JNliudV15NX/va18ryoIgcPOwj++pXvxraJvKGuImcwU37lC2RYblUctTmgfbIlcz5LxFIBBKBRGCtIjAoosV477zTDisLRqpq4mz8STOmT6un85gIrDICyALSYpkM8RBZakw2yiMLnirsmRAWy3Cvf/3rC1npeV10yz6pD33oQ2U5EvGwv2q77bYrm9Z75vcdQbH5XETNZncb9EWELCcaE66fdtpphSypryVE5O3uu+8uy5g2p4t+uXbcccfFkUceWaJWolKiU/Z7PfXUU/Htb387jj322EKoRMrOOuussvQID5E1S6of/OAHy7LoCSecUPZtIZaWRi1r/tmf/Vmpn6XDTIlAIpAIJAJDC4FBEa2hVeWszfqKwBe/+MVCXHbZZZcSBTr11FPLcuCb3/zmsonbO7GQHk8lVnJfsbBsuGjRovJX9yfVa45/8Ad/UIjW+973vrLUZw+YqJMlRSQNwUFeJGTKd8t7CJolRXumLM8hV4899ljZjI707b777kXGe9/73kICPQEo+iU6NmHChBLpsqF93333LbItF373u98t550Q8RK1s09LHe3dshkfybIcqn7//M//HO985zvL3khkTiSskjhEzGZ3+7RE4tynPeruc03IoeuuZUoEEoFEIBF49RAY1OsdXr3qZElDHQGRIMtSq7IM5R5poHuQBSQFuUF0EB4Eaptttin7mew/srHdhvmesjwtuMkmm5SIVk8Spmz7s0SN1B1RQm48hej1CqJKSNbxxx9fNr3bI4a0WZITdXL0Kognn3wyRJQQobo/a7/99it1Vr56iT4hY6Jx7kGW5LV3zDIlEmivlKf/ttxyy0Ic3aOd3hf2nve8p0TRbNB/3eteF29605vKxvtbb7217K3ytKI6kKNsm/m1CdFDQj2NiKiK1llerA8X2GumLTbg1+XFoa5rWb9EIBFIBIY7AnxLU1tbW7dZcqZEYDAIFKVpeI3CYO+RD+kYjsn7sJAke67s50LILP1Z8kNyMiUCiUAikAgkAr0hYKI9PD1fb63Jc4nAOkLAUqWN6KJFlva82uHDH/5wkqx1hHeKTQQSgURgfUIgI1rrU2++Cm2xLCatyvJT3fs0XCNa9jZ5P5V3ZtmIb8+Y5c1MiUAikAgkAolAfwiIaDUtXbq029NamRKBwSCAaCFMGxLRGgwumScRSAQSgUQgEeiJQFk6tKm458bi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+rsGkn8IhEAIhECfEogrmT7FPegzyzKvQX8JBEAIhEAIDDwCb7zxRrn88svLAQccUJYtW1amT5++y5MgrG644YYyZMiQcuCBB5YtW7aUM844Y5fxP/roo/LQQw+V4cOHl+OOO648/fTTZd26deX0008v48ePL3feeWcZM2ZMWbhwYXn88cfLu+++W84///yaHp+AL7/8cpk5c2b55JNPygMPPFBsW7BgQXnuuefqtiVLlpQ333yzvPPOO+Wss86qeUlj7ty55cgjj9xlubJjYBIYunz58uUDs+gp9UAhsG3btlpUnVxCCIRACLSCADHz9ttvV8G0YsWKKqCuvvrqor/5+OOPy7XXXltGjRpV3n///fKrX/2qvPXWW2XTpk1lxIgRVWg5/rbbbiuffvpp2X///csVV1xR1q9fXwXbxo0bq5D68MMP63ETJkwoU6dOLcTdoYceWp544onywgsvVPF00003VSE1evToKpiIug8++KAcdthhhWBzHPc1jz32WJk8eXLdvnbt2iL+Sy+9VGbPnl3FGgFHmB1++OGtwJM02oTAF198UXLna5PKSDFCIARCIAS6T4B4GTduXLU4bd68uYopN7W77rqrWotYo2655ZZy6623lsWLFxdiicgShzXpmWeeqaLmqaeeKj/96U+rCLvnnnuq8Jo4cWJN+/PPP69WMKLItiawirFoEU9jx46tVrVVq1ZVX4APP/xwFVjiHnzwOXJ/EgAAFNVJREFUwWXSpEn1N0sVX4HK4aHz2GOPrXmwdo0cObKKM2kldB6BCK3Oq9OcUQiEQAh0PAFC69VXX62WK1ajxuI0Y8aM8uyzz5bXXnutWreImNdff70QTSxVhg2JLeGggw6qoodFi3WMNYkVjPXLUN6UKVOqAGMVY8GSliAdQ4OGEB3DiuVVLMTdMcccU/MQb8OGDeXKK6+sVizle++998rzzz9f01EGAlEc6c2bN6/mWzPIv44ikKHDjqrO9jyZDB22Z72kVCEwkAkQPeZNETeXXnpptRARPITOrFmzqmAiXubPn19F1Jw5c+p2Q38sTYb2GovT0qVLq1BidbJNmob35GFeFpFGoEmLNcqf46dNm1aFFitVMydL+ixethmKNDSpD2TZYlEjrE466aSKXj7yY+kiBhctWlTLPZDrJWX/xwQI6v22s1smhEAvEmieHvOKnV6EnKRD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" data-filename="image.png" style="width: 602px;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAloAAAGtCAYAAADOJNrWAAAgAElEQVR4AezdB7ieVZku/pWENAi9g9Kkhk7oRXrvHYQRj2PX0ZnxjB5HxsPROepxdMb5Y2VQEBWQ3juhF0F6lSZFGbq0QEJC8r9+K674sUnI3jvZsJN9P9f1fe/3ve+q97vKvZ611rMGjR8/fsrQoUPL4MGDSyQIBIEgEASCQBAIAkFg9iAwZcqUUtnVoEGDZk+ICSUIBIEgEASCQBAIAkGgIoBfRY2VwhAEgkAQCAJBIAgEgT5CIESrj4BNsEEgCASBIBAEgkAQCNFKGQgCQSAIBIEgEASCQB8hEKLVR8Am2CAQBIJAEAgCQSAIhGilDASBIBAEgkAQCAJBoI8QCNHqI2ATbBAIAkEgCASBIBAEQrRSBoJAEAgCQSAIBIEg0EcIhGj1EbAJNggEgSAQBIJAEAgCIVopA0EgCASBIBAEgkAQ6CMEQrT6CNgEGwSCQBAIAkEgCASBEK2UgSAQBIJAEAgCQSAI9BECIVp9BGyCDQJBIAgEgSAQBIJAiFbKQBAIAkEgCASBIBAE+giBEK0+AjbBBoEgEASCQBAIAkEgRCtlIAgEgSAQBIJAEAgCfYRAiFYfAZtgg0AQCAJBIAgEgSAQopUyEASCQBAIAkEgCASBPkIgRKuPgE2wQSAIBIEgEASCQBDo90Rr0qRJ5bnnnqtvaty4ceWyyy4rd955Z95cEAgCQSAIBIEgEAT6PQKDxo8fP2XYsGFl0KBB3U7s1VdfXe65557qZ8iQIWWdddYpm2yySbf9v/jii+XNN98sCy+8cBk8+J253n/8x3+Uo48+upx11lll0UUXLRtuuGHZfffdy7HHHtvt+OIwCASBIBAEgkAQCALvBQLz9CbS008/vfz85z8vyy23XHnjjTcKTdMee+xRvv3tb5dFFllkpkH+wz/8Q3n88cfLpZdeOlO3a665Ztlpp53K4osvXiZOnFgWWGCBMnLkyJn6i4MgEASCQBAIAkEgCLzXCPSKaA0fPrwsueSSVau09NJLl4suuqh87WtfK6NGjSrf/e53p2mpkKlbbrmlkqQtt9yy5nXs2LHl4YcfLi+99FI5+eSTy5577lnmn3/+Oj14ww03VDebb7551V75s9pqq5V99923ht2mEN9r0BJ/EAgCQSAIBIEgEAS6g8A7z9vNJARaphVWWKF86lOfKvvss085++yzK4ni7ZRTTim77bZb+cIXvlAOOeSQ8ulPf7q88sor5Te/+U158sknq3bqJz/5SdWGXXLJJWXbbbct//zP/1y++MUv1rBuvfXWGvsZZ5xRDjrooPLggw9GkzWT95HHQSAIBIEgEASCQP9CYJaIlqm8JmuttVax9uqJJ54ozzzzTNVwjRkzptBSIVTnnHNOQZp+9KMflfXWW69OAZ566qllqaWWKjfeeGOh8brpppvK+eefX8M47rjjatCmCRdccMFiLdiUKVNadLkGgSAQBIJAEAgCQaDfI9CrqcPp5cqi9smTJ1cydPvtt9epwSWWWKISrVdffbWYbkSojjjiiDJ06NC6kL6ttTLtSMt13nnnleeff76SMKSN9GSR/vTSlXtBIAgEgSAQBIJAEHivEJglotVJgp599tk6tbfsssuWe++9txIrGqqbb765kqU11lijLp6XUYSsU4455pjywx/+sKy88sp1bZYF9jRYkSAQBIJAEAgCQSAIzMkIzBLRoqUi9913X50WNCW4yiqrlKeeeqquvWKG4Utf+lJ188c//rEstthiVePFtINpQBqt1157rfzgBz8oK620UrGbEcnadNNNq/mHORnYpD0IBIEgEASCQBAIAr0iWoyI2jX4jW98o2qrrr322sIWlylAmig2tewm/P73v19JmKlCa7W+973vVVMNyyyzTLnyyivLJz7xifLVr361jB49uu5OPPLII8ujjz5apxFXXXXV+nasA2M+ok1L+j1hwoS8uSAQBIJAEAgCQSAI9HsEekW0aJ823njjqrmyNuvggw8uhx9+eGnkiKYKyfrFL35RTT8gWmxn0VSRv/u7v6uarKeffrqMGDGifOc736kf04x77bVXNQeBTCFXpiIRt/nmm6+SuY022qhOMfZ7ZJPAIBAEgkAQCAJBYMAj0CvL8AMetQAQBIJAEAgCQSAIBIFuIDBL5h26EX6cBIEgEASCQBAIAkFgwCIQojVgX30yHgSCQBAIAkEgCPQ1AiFafY1wwg8CQSAIBIEgEAQGLAIhWgP21SfjQSAIBIEgEASCQF8jEKLV1wgn/CAQBIJAEAgCQWDAIhCiNWBffTIeBIJAEAgCQSAI9DUCIVp9jXDCDwJBIAgEgSAQBAYsAiFaA/bVJ+NBIAgEgSAQBIJAXyMQotXXCCf8IBAEgkAQCAJBYMAiEKI1YF99Mh4EgkAQCAJBIAj0NQIhWn2NcMIPAkEgCASBIBAEBiwCIVoD9tUn40EgCASBIBAEgkBfIxCi1dcIJ/wgEASCQBAIAkFgwCIwz+zM+cSJE8vQoUN7HOQbb7xR+O0q8847bxk0aFDX2/kfBIJAEAgCQSAIBIE5AoFZJlpPPPFEueaaa8pFF11UDjnkkLLbbrv1OOM//OEPy69+9asyatSoMnny5DJlypQaxlJLLVW23HLL8jd/8zdl0UUX7XG48RAEgkAQCAJBIAgEgfcSgV4RLRqoM888s5x//vnl9ttvL3/+85+Le/vuu2+v8vLSSy+VJ598siywwALTSJaAHn744XLVVVeVyy+/vPz4xz8u73vf+3oVfjwFgSAQBIJAEAgCQeC9QKBXa7ReeOGF8i//8i/l4osvruRo4YUXrtqowYN7FVyZZ555KsFaaaWVyllnnVUuvPDC+vnOd75TydVvf/vb8tOf/vRt+CB30jJhwoS3PKMRQ948a/Liiy+WSZMmtb/16p5PVxk/fnx5/vnnyyuvvDLtkbDENyN5/fXXa3xd4+h039LLbVcR13PPPVfefPPN+ogbBHZGQvMnTW3K9dVXX61pbv87/cFiemHBbXr57IpnZ1j5HQSCQBAIAkEgCHQfgV5ptIYNG1b+5//8n2WdddapU3pHHHHEdAlL95NRKtEaMWJEGT169DRvH/jAB8p9991Xjj322HLbbbcV5GPkyJ', 'n8950', 1, '2018-11-14 10:17:17', NULL);
INSERT INTO `revisi` (`id_revisi`, `modul_id`, `isi_revisi`, `user_revisi`, `status_revisi`, `create_revisi`, `tgl_diselesaikan_revisi`) VALUES
(90, 'proyek', '<p>Assalamualaikum Mas Mego,</p><p>pagi ini saya coba aplikasi masih ada error di dashboard</p><p><img style="width: 602px;" src="data:image/png;base64,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" data-filename="clipboard.png"></p><p>dan error di detail pelaksanaan proyek</p><p><img style="width: 602px;" src="data:image/png;base64,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', 'xfo7m', 1, '2018-11-16 01:20:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `revisi_jawab`
--

CREATE TABLE `revisi_jawab` (
  `id_revisi_jawab` int(8) NOT NULL,
  `user_revisi_jawab` varchar(10) NOT NULL,
  `revisi_id` int(8) NOT NULL,
  `isi_revisi_jawab` text NOT NULL,
  `tgl_revisi_jawab` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(10) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
('hc63d', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id_rolep` int(10) NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `menu_rolep` varchar(100) NOT NULL,
  `view_rolep` int(1) NOT NULL,
  `add_rolep` int(1) NOT NULL,
  `edit_rolep` int(1) NOT NULL,
  `del_rolep` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id_rolep`, `role_id`, `menu_rolep`, `view_rolep`, `add_rolep`, `edit_rolep`, `del_rolep`) VALUES
(1, 'hc63d', 'anggaran', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int(20) NOT NULL,
  `tipe_spk` int(1) NOT NULL,
  `tambah_spk` int(1) NOT NULL,
  `proyek_id_spk` int(20) NOT NULL,
  `nama_spk` varchar(200) NOT NULL,
  `rekanan_spk` varchar(200) NOT NULL,
  `no_spk` varchar(200) NOT NULL,
  `tgl_spk` date NOT NULL,
  `nilai_spk` decimal(30,0) NOT NULL,
  `bg_uang_spk` decimal(30,0) NOT NULL,
  `bg_jwaktu_spk` date NOT NULL,
  `bg_pelaksanaan_spk` decimal(30,0) NOT NULL,
  `bg_jwaktu_p_spk` date NOT NULL,
  `mulai_spk` date NOT NULL,
  `selesai_spk` date NOT NULL,
  `deviasi_spk` float(8,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `tipe_spk`, `tambah_spk`, `proyek_id_spk`, `nama_spk`, `rekanan_spk`, `no_spk`, `tgl_spk`, `nilai_spk`, `bg_uang_spk`, `bg_jwaktu_spk`, `bg_pelaksanaan_spk`, `bg_jwaktu_p_spk`, `mulai_spk`, `selesai_spk`, `deviasi_spk`) VALUES
(2, 1, 0, 1, 'Pekerjaan Perancangan Renovasi Rumah jabatan Kepala Perwakilan Dalam Negeri Provinsi Bali', 'CV. Nararya Cipta Amerta', '17/99/DPL/GPrt/PrL 2', '2015-07-31', '193400000', '0', '0000-00-00', '0', '0000-00-00', '2015-07-31', '2015-09-29', 0.0000),
(15, 2, 0, 3, 'Pekerjaan Pengawasan Pembangunan Gedung KPw BI Provinsi Gorontal', 'PT. Titimatra Tujutama', '17/12/DLP/GPrL', '2018-01-02', '1763000000', '0', '1970-01-01', '0', '1970-01-01', '2018-01-02', '2018-08-30', 0.0000),
(16, 1, 0, 3, 'Pekerjaan Pengawasan Pembangunan Gedung KPw BI Provinsi Gorontal', 'PT. Titimatra Tujutama', '17/12/DLP/GPrL', '2018-04-23', '1763000000', '0', '1970-01-01', '0', '1970-01-01', '2018-04-23', '2018-08-30', 0.0000),
(17, 1, 0, 2, 'Pekerjaan Perancangan Pembangunan Gedung KPw BI Provinsi Bangka Belitung', 'PT. Anggara Architeam', '17/9/DLP/GPrL', '2018-01-02', '1700000000', '0', '0000-00-00', '0', '0000-00-00', '2018-01-02', '2018-08-30', 0.0000),
(18, 3, 0, 4, 'Pekerjaan Pembangunan Gedung KPw BI Provinsi Papua', 'PT. Pembangunan Perumahan', '18/10/DLP', '2017-04-27', '227561574000', '62232000000', '2017-12-21', '11222378080', '2017-12-21', '2017-04-27', '2018-12-17', -8.0000),
(22, 3, 0, 3, 'Pembangunan Gedung KPw BI Provinsi Gorontalo', 'PT. Pembangunan Perumahan', '18/82/DPS/P', '2016-11-17', '179099400000000', '53729820000', '2018-05-10', '8954970000', '2018-05-10', '2016-11-17', '2018-05-10', 3.0000),
(28, 3, 0, 2, 'Pembangunan Gedung KPw BI Provinsi Babel', 'PT. Pembangunan Perumahan', '18/99/DPS/P', '2016-12-16', '154080000000', '30816000000', '2018-06-01', '7704000000', '2018-06-01', '2016-12-16', '2018-05-31', 2.0000),
(29, 3, 0, 8, 'Pekerjaan Renovasi Rumah Jabatan Kepala KPwBI Balikpapan', 'PT. Graha Nusantara Lestari', '18/76/DPS/P', '2017-08-02', '4799000000', '1039000000', '2018-12-15', '200000000', '2018-12-15', '2017-08-02', '2018-11-20', -10.0000),
(30, 3, 0, 6, 'Pelaksanaan Pekerjaan Renovasi dan Perluasan Gedung KPwBI Provinsi Sulawesi Selatan', 'PT. Nindya Karya', '17/31/DLP', '2015-12-07', '175490000000', '52647000000', '2018-11-30', '8774500000', '2018-06-07', '2015-12-07', '2018-06-07', -2.0000),
(31, 3, 0, 1, 'Pelaksanaan Rumah Jabatan Kepala Perwakilan Provinsi Bali', 'PT. ANDROMEGA BUANA ABADI', '18/7/DPS/P', '2016-08-05', '3499033000', '1049709000', '2017-03-16', '174951650', '2017-03-16', '2016-07-20', '2017-03-16', -15.0000),
(34, 3, 0, 11, 'Pembangunan Rumah Jabatan Kepala KPwBI Provinsi NTT', 'PT. Pritama Maju Perdana', '19/144/DPS/P', '2017-04-25', '5380000000', '0', '0000-00-00', '269000000', '2018-12-25', '2017-12-25', '2018-12-25', -6.0000),
(35, 3, 0, 12, 'Pembangunan 4 unit Rumah Bank Indonesia (RBI) di KPwBI Provinsi Gorontalo', 'PT. Matrico Triguna', '19/492/DPS/P', '2017-11-27', '6498989860', '1949696958', '2018-09-29', '324949493', '2018-09-29', '2017-11-27', '2018-09-09', -4.0000),
(37, 3, 0, 14, 'Pengadaan Perabot Non Logam Gedung 4 KPwBI (Gorontalo, Bangka Belitung, Sulawesi Selatan dan Papua)', 'PT. Sarijati Adhitama', '20/102/DPS/P', '2018-02-20', '12990000000', '3897000000', '2018-07-21', '664465736', '2018-07-21', '2018-02-20', '2018-07-20', -5.0000),
(38, 3, 0, 15, 'pelaksanaan Pekerjaan Pengadaan Alat Angkut (Narrow Aisle/Reach Truck) untuk Sistem Racking di KPwBI Provinsi Kepulauan Bangka Belitung, Provinsi Gorontalo, Provinsi Papua dan Sulawesi Selatan', 'PT Bina Pertiwi', 'No. 20/386/DPS/Srt/B', '2018-09-06', '4021600000', '0', '0000-00-00', '201080000', '2019-04-06', '2019-04-06', '0000-00-00', 0.0000),
(39, 3, 0, 16, 'Pengadaan Alat Angkut (Walkie Truck/Electric Lift Hand Pallet) untuk Sistem Racking di KPwBI Provinsi Kalimantan Utara', 'PT Traktor Nusantara', 'No. 20/261/DPS/P', '2018-05-08', '283000000', '0', '0000-00-00', '17130652', '2018-11-30', '2018-09-20', '0000-00-00', 0.0000),
(40, 3, 0, 17, 'Pekerjaan Pengadaan Kontainer Transparan Uang Kerta dan Uang Logam untuk Gedung KPwBI Provinsi Kep Bangka Belitung, Provinsi Gorontalo, Provinsi Papua, Provinsi Sulawesi Tengah dan Cirebon', 'CV Delima Mandiri', '20/387/DPS/Srt/B ', '2018-09-06', '2700000000', '0', '0000-00-00', '135000000', '1970-01-01', '2018-12-15', '0000-00-00', -30.0000),
(41, 3, 0, 18, 'Pekerjaan Pengadaan Alat Angkut (Narrow Aisle) untuk Sistem racking KPwBI Provisi Banten', 'PT Bina Pertiwi', '20/159/DPS/P ', '2018-03-16', '922000000', '0', '0000-00-00', '46100000', '2018-09-27', '2018-02-27', '0000-00-00', 0.0000),
(42, 1, 0, 19, 'aplikasi', 'cam system', '1234', '2018-11-01', '50000000', '0', '0000-00-00', '0', '0000-00-00', '2018-11-15', '2018-12-15', -1.0000),
(43, 2, 0, 19, 'aaaa', '', '', '0000-00-00', '10000000', '0', '0000-00-00', '0', '0000-00-00', '2018-11-22', '2018-11-30', -1.0000),
(44, 3, 0, 20, 'Pekerjaan Penggantian Peralatan Mekanikal Elektrikal Gedung KPwBI Balikpapan', '', '', '0000-00-00', '23000000000', '0', '0000-00-00', '0', '0000-00-00', '0000-00-00', '0000-00-00', 0.0000);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pustaka`
--

CREATE TABLE `tipe_pustaka` (
  `id_tpustaka` int(10) NOT NULL,
  `nama_tpustaka` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_pustaka`
--

INSERT INTO `tipe_pustaka` (`id_tpustaka`, `nama_tpustaka`) VALUES
(1, 'Dokumen Proyek'),
(3, 'Format Dokumen');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `pass_user` varchar(250) NOT NULL,
  `role_user` varchar(10) NOT NULL,
  `admin_user` int(1) NOT NULL,
  `aktif_user` int(1) NOT NULL,
  `last_ip_user` varchar(30) NOT NULL,
  `last_login_user` datetime NOT NULL,
  `notifikasi_user` int(1) NOT NULL,
  `menu_user` int(1) NOT NULL DEFAULT '0',
  `create_user` datetime NOT NULL,
  `last_activity` datetime NOT NULL,
  `foto_user` varchar(255) NOT NULL,
  `bisnis_id_user` int(10) NOT NULL,
  `lokasi_id_user` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `pass_user`, `role_user`, `admin_user`, `aktif_user`, `last_ip_user`, `last_login_user`, `notifikasi_user`, `menu_user`, `create_user`, `last_activity`, `foto_user`, `bisnis_id_user`, `lokasi_id_user`) VALUES
('6bmgy', 'Megonesia', 'megonesia@gmail.com', '$2a$08$v.2apyY06eagpmPc6EmDZOAL7hQf8tCA9djaKsx26R0qgBeT57.DK', '', 1, 1, '::1', '2021-08-20 13:47:55', 0, 1, '2016-09-29 03:45:11', '2021-08-20 13:47:55', '', 0, 0),
('5hcvd', 'Trio Puji A', 'trio_pa@bi.go.id', '$2a$08$RWdS1TUhGfBMmd7BQZC/wOJlv4Dvz3Z.hmgdqGYkWQSaMAQrQnPsS', '', 1, 1, '', '0000-00-00 00:00:00', 0, 0, '2019-09-13 15:07:37', '0000-00-00 00:00:00', '', 0, 0),
('pu7up', 'Admin', 'admin@admin.com', '$2a$08$YU5bqyTkOUqvnba3qxt13OGi3RxldoJlsqlToQrkZCzTL0XM7erT.', '', 1, 1, '', '0000-00-00 00:00:00', 0, 0, '2021-08-20 13:46:46', '0000-00-00 00:00:00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userautologin`
--

CREATE TABLE `userautologin` (
  `key_id` char(32) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userautologin`
--

INSERT INTO `userautologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('20d3b9c4718d50b76f0e69d98921ba48', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.103 Safari/537.36 Vivaldi/2.1.1337.47', '125.166.212.142', '2018-11-16 04:16:25'),
('ad4f8467208a8e043fb4e23a000c6fb4', 'n8950', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G950F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36', '114.124.196.138', '2018-11-13 06:40:50'),
('5653e7e42ecedf232439a21938676956', 'n8950', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '140.213.51.45', '2018-11-13 08:20:02'),
('dedc094868390e191e41831e32bad1b7', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', '125.166.212.142', '2018-11-16 15:52:53'),
('ec0c8570387170864ed8e19164e5ae56', 'n8950', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '182.253.163.0', '2018-11-17 06:19:25'),
('6beef2309fd2ab4e22d3f0b644742ecb', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', '125.166.212.142', '2018-11-19 04:38:04'),
('d092ef31053d942548d485f2e364fc48', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.103 Safari/537.36 Vivaldi/2.1.1337.47', '125.166.212.142', '2018-11-20 00:11:16'),
('a66db07f8e10ef5be9042a1948edd46a', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', '125.166.212.142', '2018-11-21 04:50:22'),
('b65a5ef7354b322ad8d9d6889e32be18', 'n8950', 'Mozilla/5.0 (Linux; Android 10; SM-G975F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', '114.124.212.113', '2020-01-28 07:38:17'),
('496f3695da5b11d71123c757824ee90f', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', '::1', '2020-08-31 00:50:02'),
('7bef851fbe1db885e465f290b9514634', '6bmgy', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', '125.161.108.214', '2020-08-31 02:18:06'),
('e447e4e376cae977bd3acd79806ac8a6', '6bmgy', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '::1', '2021-08-20 06:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id_user_permission` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `permission_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id_about_us`);

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `anggaran_detail`
--
ALTER TABLE `anggaran_detail`
  ADD PRIMARY KEY (`id_anggaran_detail`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_ke`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `proyek_log`
--
ALTER TABLE `proyek_log`
  ADD PRIMARY KEY (`id_pl`);

--
-- Indexes for table `proyek_tipe`
--
ALTER TABLE `proyek_tipe`
  ADD PRIMARY KEY (`id_proyek_t`);

--
-- Indexes for table `pustaka`
--
ALTER TABLE `pustaka`
  ADD PRIMARY KEY (`id_pustaka`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_revisi`);

--
-- Indexes for table `revisi_jawab`
--
ALTER TABLE `revisi_jawab`
  ADD PRIMARY KEY (`id_revisi_jawab`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id_rolep`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`);

--
-- Indexes for table `tipe_pustaka`
--
ALTER TABLE `tipe_pustaka`
  ADD PRIMARY KEY (`id_tpustaka`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id_user_permission`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id_about_us` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8438;
--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id_anggaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `anggaran_detail`
--
ALTER TABLE `anggaran_detail`
  MODIFY `id_anggaran_detail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id_ke` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id_progress` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `proyek_log`
--
ALTER TABLE `proyek_log`
  MODIFY `id_pl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `proyek_tipe`
--
ALTER TABLE `proyek_tipe`
  MODIFY `id_proyek_t` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pustaka`
--
ALTER TABLE `pustaka`
  MODIFY `id_pustaka` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_revisi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `revisi_jawab`
--
ALTER TABLE `revisi_jawab`
  MODIFY `id_revisi_jawab` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id_rolep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tipe_pustaka`
--
ALTER TABLE `tipe_pustaka`
  MODIFY `id_tpustaka` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id_user_permission` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
