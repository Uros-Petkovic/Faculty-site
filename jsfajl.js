/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Ova funkcija ispituje informacije o nastavniku, da li su sva polja ispravno
 * uneta, u suprotnom vraca false i forma se ne submituje
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function nastavnikprofil(){
    var ime=document.mojaforma.ime.value;
    var prezime=document.mojaforma.prezime.value;
    var biografija=document.mojaforma.biografija.value;
    var status=document.mojaforma.status.value;
    var zvanje=document.mojaforma.zvanje.value;
    var kabinet=document.mojaforma.kabinet.value;
    var adresa=document.mojaforma.adresa.value;
    var mobilni=document.mojaforma.mobilni.value;
    var licniweb=document.mojaforma.licniweb.value;
    if(ime.length==0 || prezime.length==0 || zvanje.length==0 || kabinet.length==0 || adresa.length==0){
        alert("Morate popuniti sva polja osim polja za mobilni telefon, biografiju i licni web sajt!");
        return(false);
    }else{
        if(ime.charAt(0)===ime.charAt(0).toUpperCase()){
            if(prezime.charAt(0)===prezime.charAt(0).toUpperCase()){
                    if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                        if(mobilni.length>0){
                            var uzorak=/^\d{3}(( )|(-))?\d{4}(( )|(-))?\d{3}$/;
                            var dali=uzorak.test(mobilni);
                            if(dali){
                                if(biografija.length>0){
                                    if(biografija.charAt(0)===biografija.charAt(0).toUpperCase()){
                                        return(true);
                                    }else{
                                        alert("Prvo slovo biografije mora biti veliko!");
                                        return(false);
                                    }
                                }else{
                                    return(true);
                                }
                            }else{
                                alert("Unet je telefon u pogresnom formatu!");
                                return(false);
                            }
                        }else{
                            if(biografija.length>0){
                                if(biografija.charAt(0)===biografija.charAt(0).toUpperCase()){
                                    return(true);
                                }else{
                                    alert("Prvo slovo biografije mora biti veliko!");
                                    return(false);
                                }
                            }else{
                                return(true);
                            }
                        }
                    }else{
                        alert("Uneto je nepostojece zvanje!");
                        return(false);
                    }
            }else{
                alert("Prvo slovo prezimena mora biti veliko!");
                return(false);
            }
        }else{
            alert("Prvo slovo imena mora biti veliko!");
            return(false);
        }
    }

}
/**
 * Ova funkcija ispituje informacije o formi za dodavanje obavestenja,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituje se naslov, sadrzaj i datum obavestenja
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function dodajobavestenje(){
    var naslov=document.mojaforma.naslov.value;
    var sadrzaj=document.mojaforma.sadrzaj.value;
    var datum=document.mojaforma.datum_objave.value;
    if(naslov.length==0 || sadrzaj.length==0 || datum.length==0){
        alert("Morate popuniti sva polja osim fajla!");
        return(false);
    }else{
        if(naslov.charAt(0)===naslov.charAt(0).toUpperCase()){
            if(sadrzaj.charAt(0)===sadrzaj.charAt(0).toUpperCase()){
                return(true);
            }else{
                alert("Sadrzaj mora poceti velikim slovom!");
                return(false);
            }
        }else{
            alert("Naslov mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o formi za azuriranje obavestenja,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituje se naslov, sadrzaj i datum obavestenja
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function azurirajobavestenje(){
    var naslov=document.mojaforma.naslov.value;
    var sadrzaj=document.mojaforma.sadrzaj.value;
    var datum=document.mojaforma.datum_objave.value;
    if(naslov.length==0 || sadrzaj.length==0 || datum.length==0){
        alert("Morate popuniti sva polja osim fajla!");
        return(false);
    }else{
        if(naslov.charAt(0)===naslov.charAt(0).toUpperCase()){
            if(sadrzaj.charAt(0)===sadrzaj.charAt(0).toUpperCase()){
                return(true);
            }else{
                alert("Sadrzaj mora poceti velikim slovom!");
                return(false);
            }
        }else{
            alert("Naslov mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o predmetu,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituju se polja koja imaju smisla da se menjaju
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function opredmetu(){
    var naziv=document.mojaforma.naziv.value;
    var cilj=document.mojaforma.cilj.value;
    var ishod=document.mojaforma.ishod.value;
    var komentar=document.mojaforma.komentar.value;
    var fond=document.mojaforma.fond.value;
    var espb=document.mojaforma.espb.value;
    if(naziv.length==0 || cilj.length==0 || ishod.length==0 || fond.length==0 || espb.length==0){
        alert("Morate uneti sva polja osim dodatnih informacija!");
        return(false);
    }else{
        if(naziv.charAt(0)===naziv.charAt(0).toUpperCase()){
            if(cilj.charAt(0)===cilj.charAt(0).toUpperCase()){
                if(ishod.charAt(0)===ishod.charAt(0).toUpperCase()){
                    var uzorak=/^[2-7]$/;
                    dali=uzorak.test(espb);
                    if(dali){
                        var uzorak1=/^([1-3]\+[1-3]\+[1-3])|([1-3]\+[1-3])|([1-3])$/;
                        dali1=uzorak1.test(fond);
                        if(dali1){
                            if(komentar.length==0){
                                return(true);
                            }else{
                                if(komentar.charAt(0)===komentar.charAt(0).toUpperCase()){
                                    return(true);
                                }else{
                                    alert("Komentar mora poceti velikim slovom!");
                                    return(false);
                                }
                            }
                        }else{
                            alert("Nepostojeci format fonda casova!");
                            return(false);
                        }
                    }else{
                        alert("Unet je nepostojeci broj ESPB poena!");
                        return(false);
                    }
                }else{
                    alert("Ishod predmeta mora poceti velikim slovom!");
                    return(false);
                }
            }else{
                alert("Cilj predmeta mora poceti velikim slovom");
                return(false);
            }
        }else{
            alert("Naziv mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje izmenu kategorija,odnosno naziva postojece kategorije,
 *  da li je polje ispravno uneto, u suprotnom vraca false i forma se 
 *  ne submituje,ispituje se naziv kategorije i menja se isti
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function izmenakategorije(){
    var naziv=document.mojaforma.naziv.value;
    if(naziv.length==0){
        alert("Niste popunili polje za naziv kategorije!");
        return(false);
    }else{
        if(naziv.charAt(0)===naziv.charAt(0).toUpperCase()){
            return(true);
        }else{
            alert("Naziv kategorije mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje dodavanje nove kategorije u obavestenja,
 *  da li je polje za naziv ispravno uneto, u suprotnom vraca false i forma se 
 *  ne submituje
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function dodajkategoriju(){
    var naziv=document.mojaforma1.novakategorija.value;
    if(naziv.length==0){
        alert("Niste popunili polje za novi naziv kategorije!");
        return(false);
    }else{
        if(naziv.charAt(0)===naziv.charAt(0).toUpperCase()){
            return(true);
        }else{
            alert("Novi naziv kategorije mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o poljima za dodavanje opsteg obavestenja,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituje se naslov, sadrzaj,datum i kategorija obavestenja
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function dodajobavestenjesajt(){
    var naslov=document.mojaforma.naslov.value;
    var sadrzaj=document.mojaforma.sadrzaj.value;
    var datum=document.mojaforma.datum_objave.value;
    var kategorija=document.mojaforma.kategorija.value;
    if(naslov.length==0 || sadrzaj.length==0 || datum.length==0 || kategorija.length==0){
        alert("Morate uneti sva polja!");
        return(false);
    }else{
       if(naslov.charAt(0)===naslov.charAt(0).toUpperCase()){
           if(sadrzaj.charAt(0)===sadrzaj.charAt(0).toUpperCase()){
               return(true);
           }else{
               alert("Sadrzaj mora poceti velikim slovom!");
               return(false);
           }
       }else{
           alert("Naslov mora poceti velikim slovom!");
           return(false);
       }
    }
}
/**
 * Ova funkcija ispituje informacije o planu angazovanja profesora,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje, ovo je kada se izmenjuje postojece angazovanje za vezbe
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function planangazovanja1(){
    var nastavnik=document.mojaforma1.nastavnik1.value;
    var dan=document.mojaforma1.dan1.value;
    var pocetak=document.mojaforma1.pocetak1.value;
    var kraj=document.mojaforma1.kraj1.value;
    var sala=document.mojaforma1.sala1.value;
    if(nastavnik.length==0){
        alert("Morate izabrati nastavnika!");
        return(false);
    }else{
        if(dan.length==0){
            alert("Morate izabrati dan!");
            return(false);
        }else{
            if(pocetak.length==0){
                alert("Morate izabrati termin za pocetak casa!");
                return(false);
            }else{
                if(kraj.length==0){
                    alert("Morate izabrati termin za kraj casa!");
                    return(false);
                }else{
                    if(sala.length==0){
                        alert("Morate izabrati salu!");
                        return(false);
                    }else{
                        if(pocetak.substring(0,2)<8){
                            alert("Predavanja i vezbe ne mou poceti pre 8h!");
                            return(false);
                        }else{
                            if(kraj.substring(0,2)>=22 && kraj.substring(3,5)>=0){
                                alert("Predavanja i vezbe se ne drze posle 22h!");
                                return(false);
                            }else{
                                return(true);
                            }
                        }
                    }
                }
            }
        }
    }
}
/**
 * Ova funkcija ispituje informacije o planu angazovanja profesora,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ovo je kada se unosi novo angazovanje za vezbe
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function planangazovanja2(){
    var nastavnik=document.mojaforma2.nastavnik2.value;
    var dan=document.mojaforma2.dan2.value;
    var pocetak=document.mojaforma2.pocetak2.value;
    var kraj=document.mojaforma2.kraj2.value;
    var sala=document.mojaforma2.sala2.value;
    if(nastavnik.length==0){
        alert("Morate izabrati nastavnika!");
        return(false);
    }else{
        if(dan.length==0){
            alert("Morate izabrati dan!");
            return(false);
        }else{
            if(pocetak.length==0){
                alert("Morate izabrati termin za pocetak casa!");
                return(false);
            }else{
                if(kraj.length==0){
                    alert("Morate izabrati termin za kraj casa!");
                    return(false);
                }else{
                    if(sala.length==0){
                        alert("Morate izabrati salu!");
                        return(false);
                    }else{
                        if(pocetak.substring(0,2)<8){
                            alert("Predavanja i vezbe ne mou poceti pre 8h!");
                            return(false);
                        }else{
                            if(kraj.substring(0,2)>=22 && kraj.substring(3,5)>=0){
                                alert("Predavanja i vezbe se ne drze posle 22h!");
                                return(false);
                            }else{
                                return(true);
                            }
                        }
                    }
                }
            }
        }
    }
}
/**
 * Ova funkcija ispituje informacije o planu angazovanja profesora,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ovde se izmenjuje postojece angazovanje za predavanja
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function planangazovanja3(){
    var nastavnik=document.mojaforma3.nastavnik3.value;
    var dan=document.mojaforma3.dan3.value;
    var pocetak=document.mojaforma3.pocetak3.value;
    var kraj=document.mojaforma3.kraj3.value;
    var sala=document.mojaforma3.sala3.value;
    if(nastavnik.length==0){
        alert("Morate izabrati nastavnika!");
        return(false);
    }else{
        if(dan.length==0){
            alert("Morate izabrati dan!");
            return(false);
        }else{
            if(pocetak.length==0){
                alert("Morate izabrati termin za pocetak casa!");
                return(false);
            }else{
                if(kraj.length==0){
                    alert("Morate izabrati termin za kraj casa!");
                    return(false);
                }else{
                    if(sala.length==0){
                        alert("Morate izabrati salu!");
                        return(false);
                    }else{
                        if(pocetak.substring(0,2)<8){
                            alert("Predavanja i vezbe ne mou poceti pre 8h!");
                            return(false);
                        }else{
                            if(kraj.substring(0,2)>=22 && kraj.substring(3,5)>=0){
                                alert("Predavanja i vezbe se ne drze posle 22h!");
                                return(false);
                            }else{
                                return(true);
                            }
                        }
                    }
                }
            }
        }
    }
}
/**
 * Ova funkcija ispituje informacije o planu angazovanja profesora,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje, ovde se ispituje novo angazovanje za predavanja
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function planangazovanja4(){
    var nastavnik=document.mojaforma4.nastavnik4.value;
    var dan=document.mojaforma4.dan4.value;
    var pocetak=document.mojaforma4.pocetak4.value;
    var kraj=document.mojaforma4.kraj4.value;
    var sala=document.mojaforma4.sala4.value;
    if(nastavnik.length==0){
        alert("Morate izabrati nastavnika!");
        return(false);
    }else{
        if(dan.length==0){
            alert("Morate izabrati dan!");
            return(false);
        }else{
            if(pocetak.length==0){
                alert("Morate izabrati termin za pocetak casa!");
                return(false);
            }else{
                if(kraj.length==0){
                    alert("Morate izabrati termin za kraj casa!");
                    return(false);
                }else{
                    if(sala.length==0){
                        alert("Morate izabrati salu!");
                        return(false);
                    }else{
                        if(pocetak.substring(0,2)<8){
                            alert("Predavanja i vezbe ne mou poceti pre 8h!");
                            return(false);
                        }else{
                            if(kraj.substring(0,2)>=22 && kraj.substring(3,5)>=0){
                                alert("Predavanja i vezbe se ne drze posle 22h!");
                                return(false);
                            }else{
                                return(true);
                            }
                        }
                    }
                }
            }
        }
    }
}
/**
 * Ova funkcija ispituje informacije o dodavanju novog studenta,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function dodajkorisnika(){
    var ime=document.mojaforma.ime.value;
    var prezime=document.mojaforma.prezime.value;
    var studije=document.mojaforma.tipstudija.value;
    var indeks=document.mojaforma.indeks.value;
    var email=document.mojaforma.email.value;
    var password=document.mojaforma.password.value;
    var status=document.mojaforma.status.value;
    if(ime.length==0 || prezime.length==0 || studije.length==0 || indeks.length==0 || email.length==0 || password.length==0 || status.length==0){
        alert("Morate popuniti sva polja u formi!");
        return(false);
    }else{
        if(ime.charAt(0)===ime.charAt(0).toUpperCase()){
            if(prezime.charAt(0)===prezime.charAt(0).toUpperCase()){
                if(studije=='d'){
                    var uzorak=/^20(([0-1][0-9])|(20))\/0\d{3}$/;
                }
                if(studije=='m'){
                    var uzorak=/^20(([0-1][0-9])|(20))\/3\d{3}$/;
                }
                if(studije=='p'){
                    var uzorak=/^20(([0-1][0-9])|(20))\/5\d{3}$/;
                }
                dali=uzorak.test(indeks);
                if(dali){
                    if(studije=='d'){
                        var uzorak1=/^[a-z]{2}(([0-1][0-9])|(20))0\d{3}d@student\.etf\.rs$/;
                    }
                    if(studije=='m'){
                        var uzorak1=/^[a-z]{2}(([0-1][0-9])|(20))3\d{3}m@student\.etf\.rs$/;
                    }
                    if(studije=='p'){
                        var uzorak1=/^[a-z]{2}(([0-1][0-9])|(20))5\d{3}p@student\.etf\.rs$/;
                    }
                    dali1=uzorak1.test(email);
                    if(dali1){
                        if(prezime.charAt(0).toLowerCase()==email.substring(0,1)){
                            if(ime.charAt(0).toLowerCase()==email.substring(1,2)){
                                if(email.substring(2,4)==indeks.substring(2,4)){
                                    if(email.substring(4,8)==indeks.substring(5,9)){
                                        if(password.length<7){
                                            alert("Lozinka mora imati minimum 7 karaktera!");
                                            return(false);
                                        }else{
                                            return(true);
                                        }     
                                    }else{
                                        alert("Poslednja 4 broja ne odgovaraju broju indeksa!");
                                        return(false);
                                    }
                                }else{
                                    alert("Prva dva broja u mejlu ne odgovaraju poslednjim dvema ciframa u godini indeksa!");
                                    return(false);
                                }
                            }else{
                                alert("Drugo slovo mejla nije jednako inicijalu imena!");
                                return(false);
                            }
                        }else{
                            alert("Prvo slovo mejla nije jednako inicijalu prezimena!");
                            return(false);
                        }
                    }else{
                        alert("Email nije u dobrom formatu");
                        return(false);
                    }
                }else{
                    alert("Indeks nije u dobrom formatu!");
                    return(false);
                }
            }else{
                alert("Prezime mora poceti velikim slovom!");
                return(false);
            }
        }else{
            alert("Ime mora poceti velikim slovom!");
            return(false);
        }   
    }
}
/**
 * Ova funkcija ispituje informacije o dodavanju novog zaposlenog,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function dodajkorisnikaz(){
    var ime=document.mojaformaz.imez.value;
    var prezime=document.mojaformaz.prezimez.value;
    var status=document.mojaformaz.statusz.value;
    var email=document.mojaformaz.emailz.value;
    var password=document.mojaformaz.passwordz.value;
    var adresa=document.mojaformaz.adresa.value;
    var mobilni=document.mojaformaz.mobilni.value;
    var licniweb=document.mojaformaz.licniweb.value;
    var biografija=document.mojaformaz.biografija.value;
    var zvanje=document.mojaformaz.zvanje.value;
    var kabinet=document.mojaformaz.kabinet.value;
    var img=document.getElementById("mojfajl1");
    if(ime.length==0 || prezime/length==0 || status.length==0 || email.length==0 || password.length==0 || adresa.length==0 || zvanje.length==0 || kabinet.length==0){
        alert("Morate uneti sva polja osim polja za mobilni telefon, licni web sajt i biografiju!");
        return(false);
    }else{
        if(ime.charAt(0)===ime.charAt(0).toUpperCase()){
            if(prezime.charAt(0)===prezime.charAt(0).toUpperCase()){
                var uzorak=/^((\w{1,})|(\w{1,}\.\w{1,}))@etf\.bg\.ac\.rs$/;
                dali=uzorak.test(email);
                if(dali){
                    if(password.length<7){
                        alert("Lozinka mora biti duza od 7 karaktera!");
                        return(false);
                    }else{
                        if(mobilni.length>0){
                            var uzorak1=/^\d{3}(( )|(-))?\d{4}(( )|(-))?\d{3}$/;
                            dali1=uzorak1.test(mobilni);
                            if(dali1){
                                if(biografija.length>0){
                                    if(biografija.charAt(0)===biografija.charAt(0).toUpperCase()){
                                        if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                            return(true);
                                        }else{
                                            alert("Uneto je neispravno zvanje!");
                                            return(false);
                                        }
                                    }else{
                                        alert("Biografija mora poceti velikim slovom!");
                                        return(false);
                                    }
                                }else{
                                    if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                        return(true);
                                    }else{
                                        alert("Uneto je neispravno zvanje!");
                                        return(false);
                                    }
                                }
                            }else{
                                alert("Telefon nije u dobrom formatu!");
                                return(false);
                            }
                        }else{
                            if(biografija.length>0){
                                if(biografija.charAt(0)===biografija.charAt(0).toUpperCase()){
                                    if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                        return(true);
                                    }else{
                                        alert("Uneto je neispravno zvanje!");
                                        return(false);
                                    }
                                }else{
                                    alert("Biografija mora poceti velikim slovom!");
                                    return(false);
                                }
                            }else{
                                if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                    return(true);
                                }else{
                                    alert("Uneto je neispravno zvanje!");
                                    return(false);
                                }
                            }
                        }
                    }
                }else{
                    alert("Mejl nije u dobrom formatu!");
                    return(false);
                }
            }else{
                alert("Prezime mora poceti velikim slovom!");
                return(false);
            }
        }else{
            alert("Ime mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o azuriranju studenta,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function azurirajkorisnika(){
    var ime=document.mojaforma.ime.value;
    var prezime=document.mojaforma.prezime.value;
    var indeks=document.mojaforma.indeks.value;
    var email=document.mojaforma.email.value;
    var password=document.mojaforma.password.value;
    var status=document.mojaforma.status.value;
    var tipstudija=document.mojaforma.tipstudija.value;
    if(tipstudija=='Osnovne studije'){
        var tip='d';
    }
    if(tipstudija=='Master studije'){
        var tip='m';
    }
    if(tipstudija=='Doktorske studije'){
        var tip='p';
    }
    if(ime.length==0 || prezime.length==0 || indeks.length==0 || email.length==0 || password.length==0 || status.length==0){
        alert("Morate popuniti sva polja!");
        return(false);
    }else{
        if(ime.charAt(0)===ime.charAt(0).toUpperCase()){
            if(prezime.charAt(0)===prezime.charAt(0).toUpperCase()){
                if(tip=='d'){
                    var uzorak=/^20(([0-1][0-9])|(20))\/0\d{3}$/;
                }
                if(tip=='m'){
                    var uzorak=/^20(([0-1][0-9])|(20))\/3\d{3}$/;
                }
                if(tip=='p'){
                    var uzorak=/^20(([0-1][0-9])|(20))\/5\d{3}$/;
                }
                dali=uzorak.test(indeks);
                if(dali){
                    if(tip=='d'){
                        var uzorak1=/^[a-z]{2}(([0-1][0-9])|(20))0\d{3}d@student\.etf\.rs$/;
                    }
                    if(tip=='m'){
                        var uzorak1=/^[a-z]{2}(([0-1][0-9])|(20))3\d{3}m@student\.etf\.rs$/;
                    }
                    if(tip=='p'){
                        var uzorak1=/^[a-z]{2}(([0-1][0-9])|(20))5\d{3}p@student\.etf\.rs$/;
                    }
                    dali1=uzorak1.test(email);
                    if(dali1){
                        if(prezime.charAt(0).toLowerCase()==email.substring(0,1)){
                            if(ime.charAt(0).toLowerCase()==email.substring(1,2)){
                                if(email.substring(2,4)==indeks.substring(2,4)){
                                    if(email.substring(4,8)==indeks.substring(5,9)){
                                        if(password.length<7){
                                            alert("Lozinka mora imati minimum 7 karaktera!");
                                            return(false);
                                        }else{
                                            return(true);
                                        }     
                                    }else{
                                        alert("Poslednja 4 broja ne odgovaraju broju indeksa");
                                        return(false);
                                    }
                                }else{
                                    alert("Prva dva broja u mejlu ne odgovaraju poslednjim dvema ciframa u godini indeksa!");
                                    return(false);
                                }
                            }else{
                                alert("Drugo slovo mejla nije jednako inicijalu imena!");
                                return(false);
                            }
                        }else{
                            alert("Prvo slovo mejla nije jednako inicijalu prezimena!");
                            return(false);
                        }
                    }else{
                        alert("Mejl nije u dobrom formatu!");
                        return(false);
                    }
                }else{
                    alert("Indeks nije u dobrom formatu!");
                    return(false);
                }
            }else{
                alert("Prvo slovo prezimena mora biti veliko!");
                return(false);
            }
        }else{
            alert("Prvo slovo imena mora biti veliko!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o azuriranju zaposlenog,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function azurirajkorisnikaz(){
    var ime=document.mojaformaz.imez.value;
    var prezime=document.mojaformaz.prezimez.value;
    var status=document.mojaformaz.statusz.value;
    var email=document.mojaformaz.emailz.value;
    var password=document.mojaformaz.passwordz.value;
    var adresa=document.mojaformaz.adresa.value;
    var mobilni=document.mojaformaz.mobilni.value;
    var licniweb=document.mojaformaz.licniweb.value;
    var biografija=document.mojaformaz.biografija.value;
    var zvanje=document.mojaformaz.zvanje.value;
    var kabinet=document.mojaformaz.kabinet.value;
    if(ime.length==0 || prezime/length==0 || status.length==0 || email.length==0 || password.length==0 || adresa.length==0 || zvanje.length==0 || kabinet.length==0){
        alert("Morate uneti sva polja osim polja za mobilni telefon, licni web sajt i biografiju!");
        return(false);
    }else{
        if(ime.charAt(0)===ime.charAt(0).toUpperCase()){
            if(prezime.charAt(0)===prezime.charAt(0).toUpperCase()){
                var uzorak=/^((\w{1,})|(\w{1,}\.\w{1,}))@etf\.bg\.ac\.rs$/;
                dali=uzorak.test(email);
                if(dali){
                    if(password.length<7){
                        alert("Lozinka mora biti duza od 7 karaktera!");
                        return(false);
                    }else{
                        if(mobilni.length>0){
                            var uzorak1=/^\d{3}(( )|(-))?\d{4}(( )|(-))?\d{3}$/;
                            dali1=uzorak1.test(mobilni);
                            if(dali1){
                                if(biografija.length>0){
                                    if(biografija.charAt(0)===biografija.charAt(0).toUpperCase()){
                                        if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                            return(true);
                                        }else{
                                            alert("Uneto je neispravno zvanje!");
                                            return(false);
                                        }
                                    }else{
                                        alert("Biografija mora poceti velikim slovom!");
                                        return(false);
                                    }
                                }else{
                                    if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                        return(true);
                                    }else{
                                        alert("Uneto je neispravno zvanje!");
                                        return(false);
                                    }
                                }
                            }else{
                                alert("Telefon nije u dobrom formatu!");
                                return(false);
                            }
                        }else{
                            if(biografija.length>0){
                                if(biografija.charAt(0)===biografija.charAt(0).toUpperCase()){
                                    if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                        return(true);
                                    }else{
                                        alert("Uneto je neispravno zvanje!");
                                        return(false);
                                    }
                                }else{
                                    alert("Biografija mora poceti velikim slovom!");
                                    return(false);
                                }
                            }else{
                                if(zvanje=='redovni profesor' || zvanje=='vanredni profesor' || zvanje=='docent' || zvanje=='asistent' || zvanje=='saradnik u nastavi' || zvanje=='laboratorijski tehnicar'){
                                    return(true);
                                }else{
                                    alert("Uneto je neispravno zvanje!");
                                    return(false);
                                }
                            }
                        }
                    }
                }else{
                    alert("Mejl nije u dobrom formatu!");
                    return(false);
                }
            }else{
                alert("Prezime mora poceti velikim slovom!");
                return(false);
            }
        }else{
            alert("Ime mora poceti velikim slovom!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o promeni lozinke,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituju se mejl, stara i nova lozinka u slucaju kada moze,
 *  a i ne mora da se menje lozinka
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function promenalozinke(){
    var email=document.mojaforma.username.value;
    var staripassword=document.mojaforma.staripassword.value;
    var novipassword=document.mojaforma.novipassword.value;
    if(email.length==0 || staripassword.length==0 || novipassword.length==0){
        alert("Morate popuniti sva polja!");
        return(false);
    }else{
        var uzorak=/^((\w{1,})|(\w{1,}\.\w{1,}))@etf\.bg\.ac\.rs$/;
        var uzorak1=/^[a-z]{2}\d{6}\w{1}@student\.etf\.rs$/;
        dali=uzorak.test(email);
        dali1=uzorak1.test(email);
        if(dali || dali1){
            if(novipassword.length>7){
                if(staripassword==novipassword){
                    alert("Nova lozinka mora biti razlicita od stare lozinke!");
                    return(false);
                }else{
                    return(true);
                }
            }else{
                alert("Lozinka mora biti duza od 7 karaktera!");
                return(false);
            }
        }else{
            alert("Mejl nije u dobrom formatu!");
            return(false);
        }
    }
}
/**
 * Ova funkcija ispituje informacije o promeni lozinke,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituju se mejl, stara i nova lozinka u slucaju kada mora da
 *  se menja lozinka
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function promenalozinke1(){
    var email=document.mojaforma1.username1.value;
    var staripassword=document.mojaforma1.staripassword1.value;
    var novipassword=document.mojaforma1.novipassword1.value;
    if(email.length==0 || staripassword.length==0 || novipassword.length==0){
        alert("Morate popuniti sva polja!");
        return(false);
    }else{
        var uzorak=/^((\w{1,})|(\w{1,}\.\w{1,}))@etf\.bg\.ac\.rs$/;
        var uzorak1=/^[a-z]{2}\d{6}\w{1}@student\.etf\.rs$/;
        dali=uzorak.test(email);
        dali1=uzorak1.test(email);
        if(dali || dali1){
            if(novipassword.length>6){
                if(staripassword==novipassword){
                    alert("Nova lozinka mora biti razlicita od stare lozinke!");
                    return(false);
                }else{
                    return(true);
                }
            }else{
                alert("Lozinka mora imati minimum 7 karaktera!");
                return(false);
            }
        }else{
            alert("Mejl nije u dobrom formatu!");
            return(false);
        }
    }
} 
/**
 * Ova funkcija ispituje informacije o logovanju,
 *  da li su sva polja ispravno uneta, u suprotnom vraca false i forma se 
 *  ne submituje,ispituju se mejl i lozinka da li odgovaraju potrebnim formatima
 * @returns {Boolean} indikator o ispravnosti forme, submituje ako je 1
 */
function logovanje(){
    var email=document.mojaforma.username.value;
    var password=document.mojaforma.password.value;
    if(email.length==0 || password.length==0){
        alert("Morate uneti i korisnicko ime i lozinku!");
        return(false);
    }else{
        var uzorak=/^((\w{1,})|(\w{1,}\.\w{1,}))@etf\.bg\.ac\.rs$/;
        var uzorak1=/^[a-z]{2}\d{6}\w{1}@student\.etf\.rs$/;
        dali=uzorak.test(email);
        dali1=uzorak1.test(email);
        if(dali || dali1){
            if(password.length>6){
                return(true);
            }else{
                alert("Lozinka nema minimum 7 karaktera!");
                return(false);
            }
        }else{
            alert("Mejl nije u dobrom formatu!");
            return(false);
        }
    }
}