<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
	{
		
        // Get the playerID from the querystring; 
        $name          = $request->query->get('term');
         
         // DB connection string.
        $conn          = $this->get('database_connection');  
		
		// If no querystring variables for player selection are available, pull a random entry from the database for display.
		if (empty($_GET)) {
			$int_as_string        = (string) rand(1,18589);
			$sql = "select playerID from people where id=?";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1, $int_as_string);
			$stmt->execute();
			
			while ($row = $stmt->fetch()) {
				$name = $row['playerID'];
			}
		}
        
        $personal      = $conn->fetchall('select playerID,birthMonth,birthYear,birthDay,birthCountry,birthState,deathYear,deathMonth,deathDay,deathCountry,deathState,deathCity,nameFirst,nameLast,nameGiven,weight,height,bats,throws,debut,finalGame,retroID,bbrefID from Master where playerID =  ?', array($name));
        $hof           = $conn->fetchall('select  a.playerID, b.yearid, ballots, needed, votes,b.inducted,b.votedBy, nameLast, nameFirst, birthCountry, birthState  from Master a, HallOfFame b where a.PlayerID = b.PlayerID and b.inducted = "Y" and a.playerID = ?', array($name));
        $award         = $conn->fetchall('select  awardID,yearID,lgID,tie inducted from AwardsPlayers a where playerID=?', array($name)); 
        $appearances   = $conn->fetchall('select  playerID,   yearID, teamID,LgID, G_all, GS, G_batting, g_defense   from Appearances where playerID =  ?', array($name));
        $batting       = $conn->fetchall('select  playerID,   yearID,stint,teamID,G,G_batting,AB,R,H,2B,3B,HR,RBI,SB,CS,BB,SO,IBB,HBP,SH,SF,GIDP,G_old from Batting where playerID =  ?', array($name));
        $allstar       = $conn->fetchall('select  playerID,   yearID, gameNum, gameID, teamID, lgID, GP, startingPos from AllstarFull where playerID =  ?', array($name));
        $fielding      = $conn->fetchall('select  playerID,   yearID, stint, teamID, lgID, POS, G, GS, InnOuts, PO, A, E, DP, PB, WP, SB, CS, ZR from Fielding where playerID = ?', array($name));
        $pitching      = $conn->fetchall('select  playerID,yearID,stint, teamID, lgID, W,L,G,GS,CG,SHO,SV,IPouts,H,ER,HR,BB,SO,BAOpp,ERA,IBB,WP,HBP,BK,BFP,GF,R,SH,SF,GIDP  from Pitching where playerID = ?', array($name));
        
       
		
		
		
        return $this->render('baseball/index.html.twig', array('hof'=> $hof,'award'=> $award,'appearances' => $appearances,'allstar' => $allstar, 'fielding' => $fielding, 'pitching' => $pitching, 'personal' => $personal, 'batting' => $batting));  
        
    }
	
	
		
 
}
 

    