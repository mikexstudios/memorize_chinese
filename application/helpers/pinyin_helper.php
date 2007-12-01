<?

/*
Pinyin to Unicode Converter
Copyright (C) 2002  Konrad Mitchell Lawson
http://www.foolsworkshop.com/
http://konrad.lawson.net/

Please leave this initial header intact when 
distributing modified versions of this script.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

License available at:
http://www.gnu.org/copyleft/gpl.html
*/

//Special thanks to James Dew and Helmer Aslaksen
function format_pinyin($syllablefinal) {
//convert all pinyin to a standard intermediary encoding
    $syllablefinal=str_replace("ang1","//aq//ng",$syllablefinal);
    $syllablefinal=str_replace("ang2","//aw//ng",$syllablefinal);
    $syllablefinal=str_replace("ang3","//ae//ng",$syllablefinal);
    $syllablefinal=str_replace("ang4","//ar//ng",$syllablefinal);
    $syllablefinal=str_replace("eng1","//eq//ng",$syllablefinal);
    $syllablefinal=str_replace("eng2","//ew//ng",$syllablefinal);
    $syllablefinal=str_replace("eng3","//ee//ng",$syllablefinal);
    $syllablefinal=str_replace("eng4","//er//ng",$syllablefinal);
    $syllablefinal=str_replace("ing1","//iq//ng",$syllablefinal);
    $syllablefinal=str_replace("ing2","//iw//ng",$syllablefinal);
    $syllablefinal=str_replace("ing3","//ie//ng",$syllablefinal);
    $syllablefinal=str_replace("ing4","//ir//ng",$syllablefinal);
    $syllablefinal=str_replace("ong1","//oq//ng",$syllablefinal);
    $syllablefinal=str_replace("ong2","//ow//ng",$syllablefinal);
    $syllablefinal=str_replace("ong3","//oe//ng",$syllablefinal);
    $syllablefinal=str_replace("ong4","//or//ng",$syllablefinal);
    $syllablefinal=str_replace("an1","//aq//n",$syllablefinal);
    $syllablefinal=str_replace("an2","//aw//n",$syllablefinal);
    $syllablefinal=str_replace("an3","//ae//n",$syllablefinal);
    $syllablefinal=str_replace("an4","//ar//n",$syllablefinal);
    $syllablefinal=str_replace("en1","//eq//n",$syllablefinal);
    $syllablefinal=str_replace("en2","//ew//n",$syllablefinal);
    $syllablefinal=str_replace("en3","//ee//n",$syllablefinal);
    $syllablefinal=str_replace("en4","//er//n",$syllablefinal);
    $syllablefinal=str_replace("in1","//iq//n",$syllablefinal);
    $syllablefinal=str_replace("in2","//iw//n",$syllablefinal);
    $syllablefinal=str_replace("in3","//ie//n",$syllablefinal);
    $syllablefinal=str_replace("in4","//ir//n",$syllablefinal);
    $syllablefinal=str_replace("un1","//uq//n",$syllablefinal);
    $syllablefinal=str_replace("un2","//uw//n",$syllablefinal);
    $syllablefinal=str_replace("un3","//ue//n",$syllablefinal);
    $syllablefinal=str_replace("un4","//ur//n",$syllablefinal);
    $syllablefinal=str_replace("ao1","//aq//o",$syllablefinal);
    $syllablefinal=str_replace("ao2","//aw//o",$syllablefinal);
    $syllablefinal=str_replace("ao3","//ae//o",$syllablefinal);
    $syllablefinal=str_replace("ao4","//ar//o",$syllablefinal);
    $syllablefinal=str_replace("ou1","//oq//u",$syllablefinal);
    $syllablefinal=str_replace("ou2","//ow//u",$syllablefinal);
    $syllablefinal=str_replace("ou3","//oe//u",$syllablefinal);
    $syllablefinal=str_replace("ou4","//or//u",$syllablefinal);
    $syllablefinal=str_replace("ai1","//aq//i",$syllablefinal);
    $syllablefinal=str_replace("ai2","//aw//i",$syllablefinal);
    $syllablefinal=str_replace("ai3","//ae//i",$syllablefinal);
    $syllablefinal=str_replace("ai4","//ar//i",$syllablefinal);
    $syllablefinal=str_replace("ei1","//eq//i",$syllablefinal);
    $syllablefinal=str_replace("ei2","//ew//i",$syllablefinal);
    $syllablefinal=str_replace("ei3","//ee//i",$syllablefinal);
    $syllablefinal=str_replace("ei4","//er//i",$syllablefinal);
    $syllablefinal=str_replace("a1","//aq//",$syllablefinal);
    $syllablefinal=str_replace("a2","//aw//",$syllablefinal);
    $syllablefinal=str_replace("a3","//ae//",$syllablefinal);
    $syllablefinal=str_replace("a4","//ar//",$syllablefinal);
    $syllablefinal=str_replace("a1","//aq//",$syllablefinal);
    $syllablefinal=str_replace("a2","//aw//",$syllablefinal);
    $syllablefinal=str_replace("a3","//ae//",$syllablefinal);
    $syllablefinal=str_replace("a4","//ar//",$syllablefinal);
    $syllablefinal=str_replace("er2","//ew//r",$syllablefinal);
    $syllablefinal=str_replace("er3","//ee//r",$syllablefinal);
    $syllablefinal=str_replace("er4","//er//r",$syllablefinal);
    $syllablefinal=str_replace("lyue","l//v//e",$syllablefinal);
    $syllablefinal=str_replace("nyue","n//v//e",$syllablefinal);
    $syllablefinal=str_replace("e1","//eq//",$syllablefinal);
    $syllablefinal=str_replace("e2","//ew//",$syllablefinal);
    $syllablefinal=str_replace("e3","//ee//",$syllablefinal);
    $syllablefinal=str_replace("e4","//er//",$syllablefinal);
    $syllablefinal=str_replace("o1","//oq//",$syllablefinal);
    $syllablefinal=str_replace("o2","//ow//",$syllablefinal);
    $syllablefinal=str_replace("o3","//oe//",$syllablefinal);
    $syllablefinal=str_replace("o4","//or//",$syllablefinal);
    $syllablefinal=str_replace("i1","//iq//",$syllablefinal);
    $syllablefinal=str_replace("i2","//iw//",$syllablefinal);
    $syllablefinal=str_replace("i3","//ie//",$syllablefinal);
    $syllablefinal=str_replace("i4","//ir//",$syllablefinal);
    $syllablefinal=str_replace("nyu3","n//ve//",$syllablefinal);
    $syllablefinal=str_replace("lyu","l//v//",$syllablefinal);
    $syllablefinal=str_replace("v1","//vq//",$syllablefinal);
    $syllablefinal=str_replace("v2","//vw//",$syllablefinal);
    $syllablefinal=str_replace("v3","//ve//",$syllablefinal);
    $syllablefinal=str_replace("v4","//vr//",$syllablefinal);
    $syllablefinal=str_replace("v0","//vs//",$syllablefinal);
    $syllablefinal=str_replace("u1","//uq//",$syllablefinal);
    $syllablefinal=str_replace("u2","//uw//",$syllablefinal);
    $syllablefinal=str_replace("u3","//ue//",$syllablefinal);
    $syllablefinal=str_replace("u4","//ur//",$syllablefinal);
//convert this intermediary encoding to unicode
    $syllablefinal=str_replace("//aq//","&#257;",$syllablefinal);
    $syllablefinal=str_replace("//aw//","&#225;",$syllablefinal);
    $syllablefinal=str_replace("//ae//","&#462;",$syllablefinal);
    $syllablefinal=str_replace("//ar//","&#224;",$syllablefinal);
    $syllablefinal=str_replace("//eq//","&#275;",$syllablefinal);
    $syllablefinal=str_replace("//ew//","&#233;",$syllablefinal);
    $syllablefinal=str_replace("//ee//","&#283;",$syllablefinal);
    $syllablefinal=str_replace("//er//","&#232;",$syllablefinal);
    $syllablefinal=str_replace("//iq//","&#299;",$syllablefinal);
    $syllablefinal=str_replace("//iw//","&#237;",$syllablefinal);
    $syllablefinal=str_replace("//ie//","&#464;",$syllablefinal);
    $syllablefinal=str_replace("//ir//","&#236;",$syllablefinal);
    $syllablefinal=str_replace("//oq//","&#333;",$syllablefinal);
    $syllablefinal=str_replace("//ow//","&#243;",$syllablefinal);
    $syllablefinal=str_replace("//oe//","&#466;",$syllablefinal);
    $syllablefinal=str_replace("//or//","&#242;",$syllablefinal);
    $syllablefinal=str_replace("//uq//","&#363;",$syllablefinal);
    $syllablefinal=str_replace("//uw//","&#250;",$syllablefinal);
    $syllablefinal=str_replace("//ue//","&#468;",$syllablefinal);
    $syllablefinal=str_replace("//ur//","&#249;",$syllablefinal);
    $syllablefinal=str_replace("//vq//","&#470;",$syllablefinal);
    $syllablefinal=str_replace("//vw//","&#472;",$syllablefinal);
    $syllablefinal=str_replace("//ve//","&#474;",$syllablefinal);
    $syllablefinal=str_replace("//vr//","&#476;",$syllablefinal);
    $syllablefinal=str_replace("//vs//","&#252;",$syllablefinal);
    $syllablefinal=str_replace("//aaq//","&#256;",$syllablefinal);
      //Do we need aa2 and aa3?
    $syllablefinal=str_replace("//aaw//","&#192;",$syllablefinal);
    $syllablefinal=str_replace("//aae//","&#461;",$syllablefinal);
    $syllablefinal=str_replace("//aar//","&#191;",$syllablefinal);
      //Do we need the capital Es?
    $syllablefinal=str_replace("//eeq//","&#274;",$syllablefinal);
    $syllablefinal=str_replace("//eew//","&#201;",$syllablefinal);
    $syllablefinal=str_replace("//eer//","&#200;",$syllablefinal);

    return ($syllablefinal);
}
?>
