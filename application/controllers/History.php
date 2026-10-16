<?php
    class History extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            $this->load->helper("general_helper");

            if($_SESSION['timeout']===true){
                redirect(base_url().'lockscreen');
            }
        }

        public function index(){
            if( !$_SESSION['nik'] || $_SESSION['nik']==""){
                redirect("login");
            };

            $this->load->view("history");
        }

        public function regpasien(){ 
            $param['pasienid']  =$this->input->post("pasienid");
            $param['episodeid'] =$this->input->post("episodeid");
            $param['jenis']     =$this->input->post("jenis");

            $url =  "https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/regpasien";
            $result = curlPost($url,$param);
            echo json_encode($result);
        }

        public function regispasienPRO(){ 
            $pencarian =$this->input->post("pencarian");
            $pencarian = str_replace(" ", "", $pencarian);
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/regispasienPRO/find/".$pencarian;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function daftarpasienPRO(){ 
            $pencarian =$this->input->post("pencarian");
            $pencarian = str_replace(" ", "", $pencarian);

            $jenis="";

            if($_SESSION['jenisuser']==='JLEV10'){
                $jenis="1";
            }else{
                $jenis="2";
            }

            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/daftarpasienPRO/find/".$pencarian.'/'.$jenis;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function daftarpasienALL(){ 
            $pencarian =$this->input->post("pencarian");
            $pencarian = str_replace(" ", "", $pencarian);
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/daftarpasienALL/find/".$pencarian;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function daftarriPRO(){ 
            $pasienid =$this->input->post("pasienid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/riwayatpasienPRO/find/".$pasienid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function daftarriALL(){ 
            $pasienid =$this->input->post("pasienid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/riwayatpasienALL/find/".$pasienid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function soapri(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/soapri/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function soapigd(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $transid   =$this->input->post("transid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/soapigd/find/".$pasienid."/".$episodeid."/".$transid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function catatanperawat(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/catatanperawat/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function catatanperawatigd(){ 
            $transid   =$this->input->post("transid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/catatanperawatigd/find/".$transid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function gizi(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/gizi/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function daftaralergi(){ 
            $pasienid =$this->input->post("pasienid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/daftaralergi/find/".$pasienid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function triase(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/triaseigd/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function anamnesaigd(){ 
            $transid   =$this->input->post("transid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/anamnesaigd/find/".$transid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function orderlab(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/orderlab/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function hasillab(){ 
            $pasienidlab  =$this->input->post("pasienidlab");
            $sampelid     =$this->input->post("sampelid");
            $url          ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/hasillab/find/".$pasienidlab."/".$sampelid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function listlab(){ 
            $pasienidlab  =$this->input->post("pasienidlab");
            $testid       =$this->input->post("testid");
            $pasienid     =$this->input->post("pasienid");
            $episodeid    =$this->input->post("episodeid");
            $url          ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/listlab/find/".$pasienidlab."/".$testid."/".$pasienid."/".$episodeid;
            $result       = curlPost($url,null);
            echo json_encode($result);
        }

        public function orderrad(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/orderrad/find/".$pasienid."/".$episodeid;
            $result    =curlPost($url,null);
            echo json_encode($result);
        }

        public function detailrad(){ 
            $episodeid  =$this->input->post("episodeid");
            $transcorad =$this->input->post("transcorad");
            $url        ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/radetail/find/".$episodeid."/".$transcorad;
            $result     =curlPost($url,null);
            echo json_encode($result);
        }

        public function hasilrad(){ 
            $transrad =$this->input->post("transrad");
            $url      ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/hasilrad/find/".$transrad;
            $result   =curlPost($url,null);

            $reader = new RtfReader();
            $reader->Parse($result['response'][0]['RESULT_RTF']);
            $formatter = new RtfHtml();
            $resultrad=$formatter->Format($reader->root);

            $metadata['code']               =200;
            $metadata['message']            ='OK';
            $data['metaData']               =$metadata;
            $data['response']['RESULT_RTF'] =$resultrad;

            echo json_encode($data);
        }

        public function orderfrm(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/orderfrm/find/".$pasienid."/".$episodeid;
            $result    =curlPost($url,null);
            echo json_encode($result);
        }

        public function detailfrm(){ 
            $pasienid     =$this->input->post("pasienid");
            $episodeid    =$this->input->post("episodeid");
            $transcofrm   =$this->input->post("transcofrm");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/detailfrm/find/".$pasienid."/".$episodeid."/".$transcofrm;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function tindakanRI(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/tindakanRI/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function resume(){ 
            $pasienid =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url =  "https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/eklaim/resume/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

    }

    
    class RtfElement{
        protected function Indent($level){
        for($i = 0; $i < $level * 2; $i++) echo "&nbsp;";
        }
    }

    class RtfGroup extends RtfElement{

        public $parent;
        public $children;

        public function __construct(){
            $this->parent = null;
            $this->children = array();
        }

        public function GetType(){
            // No children?
            if(sizeof($this->children) == 0) return null;
            // First child not a control word?
            $child = $this->children[0];
            if(get_class($child) != "RtfControlWord") return null;
            return $child->word;
        }    

        public function IsDestination(){
            // No children?
            if(sizeof($this->children) == 0) return null;
            // First child not a control symbol?
            $child = $this->children[0];
            if(get_class($child) != "RtfControlSymbol") return null;
            return $child->symbol == '*';
        }

        public function dump($level = 0){
            echo "<div>";
            $this->Indent($level);
            echo "{";
            echo "</div>";

            foreach($this->children as $child){
                if(get_class($child) == "RtfGroup"){
                    if ($child->GetType() == "fonttbl") continue;
                    if ($child->GetType() == "colortbl") continue;
                    if ($child->GetType() == "stylesheet") continue;
                    if ($child->GetType() == "info") continue;
                    // Skip any pictures:
                    if (substr($child->GetType(), 0, 4) == "pict") continue;
                    if ($child->IsDestination()) continue;
                }
                $child->dump($level + 2);
            }

            echo "<div>";
            $this->Indent($level);
            echo "}";
            echo "</div>";
        }
    }

    class RtfControlWord extends RtfElement{
        public $word;
        public $parameter;

        public function dump($level){
            echo "<div style='color:green'>";
            $this->Indent($level);
            echo "WORD {$this->word} ({$this->parameter})";
            echo "</div>";
        }
    }

    class RtfControlSymbol extends RtfElement{
        public $symbol;
        public $parameter = 0;

        public function dump($level){
            echo "<div style='color:blue'>";
            $this->Indent($level);
            echo "SYMBOL {$this->symbol} ({$this->parameter})";
            echo "</div>";
        }    
    }

    class RtfText extends RtfElement{
        public $text;

        public function dump($level){
            echo "<div style='color:red'>";
            $this->Indent($level);
            echo "TEXT {$this->text}";
            echo "</div>";
        }    
    }

    class RtfReader{
        public $root = null;

        protected function GetChar(){
            $this->char = $this->rtf[$this->pos++];
        }

        protected function ParseStartGroup(){
            // Store state of document on stack.
            $group = new RtfGroup();
            if($this->group != null) $group->parent = $this->group;
            if($this->root == null){
                $this->group = $group;
                $this->root = $group;
            }else{
                array_push($this->group->children, $group);
                $this->group = $group;
            }
        }

        protected function is_letter(){
            if(ord($this->char) >= 65 && ord($this->char) <= 90) return TRUE;
            if(ord($this->char) >= 90 && ord($this->char) <= 122) return TRUE;
            return FALSE;
        }

        protected function is_digit(){
            if(ord($this->char) >= 48 && ord($this->char) <= 57) return TRUE;
            return FALSE;
        }

        protected function ParseEndGroup(){
            // Retrieve state of document from stack.
            $this->group = $this->group->parent;
        }

        protected function ParseControlWord(){
            $this->GetChar();
            $word = "";
            while($this->is_letter()){
                $word .= $this->char;
                $this->GetChar();
            }

            // Read parameter (if any) consisting of digits.
            // Paramater may be negative.
            $parameter = null;
            $negative = false;

			if($this->char == '-') {
				$this->GetChar();
				$negative = true;
			}

        	while($this->is_digit()){
        		if($parameter == null) $parameter = 0;
        		$parameter = $parameter * 10 + $this->char;
        		$this->GetChar();
      		}

			if($parameter === null) $parameter = 1;
			if($negative) $parameter = -$parameter;

			// If this is \u, then the parameter will be followed by 
			// a character.
      		if($word == "u") {
      		}
			// If the current character is a space, then
			// it is a delimiter. It is consumed.
			// If it's not a space, then it's part of the next
			// item in the text, so put the character back.
      		else{
        		if($this->char != ' ') $this->pos--; 
      		}
 
			$rtfword = new RtfControlWord();
			$rtfword->word = $word;
			$rtfword->parameter = $parameter;
			array_push($this->group->children, $rtfword);
    	}

		protected function ParseControlSymbol(){
			// Read symbol (one character only).
			$this->GetChar();
			$symbol = $this->char;

			// Symbols ordinarily have no parameter. However, 
			// if this is \', then it is followed by a 2-digit hex-code:
			$parameter = 0;
			if($symbol == '\''){
				$this->GetChar(); 
				$parameter = $this->char;
				$this->GetChar(); 
				$parameter = hexdec($parameter . $this->char);
			}

			$rtfsymbol = new RtfControlSymbol();
			$rtfsymbol->symbol = $symbol;
			$rtfsymbol->parameter = $parameter;
			array_push($this->group->children, $rtfsymbol);
		}
 
		protected function ParseControl(){
			// Beginning of an RTF control word or control symbol.
			// Look ahead by one character to see if it starts with
			// a letter (control world) or another symbol (control symbol):
			$this->GetChar();
			$this->pos--;

			if($this->is_letter()) 
				$this->ParseControlWord();
			else
				$this->ParseControlSymbol();
		}
 
    	protected function ParseText(){
			// Parse plain text up to backslash or brace,
			// unless escaped.
      		$text = "";

      		do{
				$terminate = false;
				$escape = false;
		
				// Is this an escape?
				if($this->char == '\\'){
					// Perform lookahead to see if this
					// is really an escape sequence.
					$this->GetChar();
					switch($this->char){
						case '\\': $text .= '\\'; break;
						case '{': $text .= '{'; break;
						case '}': $text .= '}'; break;
            			default:
              			// Not an escape. Roll back.
              			$this->pos = $this->pos - 2;
              			$terminate = true;
              			break;
          			}
        		}else if($this->char == '{' || $this->char == '}'){
					$this->pos--;
					$terminate = true;
        		;}

        		if(!$terminate && !$escape){
					$text .= $this->char;
					$this->GetChar();
        		}
      		}
      		while(!$terminate && $this->pos < $this->len);

			$rtftext = new RtfText();
			$rtftext->text = $text;
			array_push($this->group->children, $rtftext);
		}
 
    	public function Parse($rtf){
			$this->rtf = $rtf;
			$this->pos = 0;
			$this->len = strlen($this->rtf);
			$this->group = null;
			$this->root = null;
 
      		while($this->pos < $this->len){
				// Read next character:
				$this->GetChar();
 
        		// Ignore \r and \n
        		if($this->char == "\n" || $this->char == "\r") continue;
 
        		// What type of character is this?
        		switch($this->char){
					case '{':
						$this->ParseStartGroup();
						break;
					case '}':
						$this->ParseEndGroup();
						break;
					case '\\':
						$this->ParseControl();
						break;
					default:
						$this->ParseText();
						break;
				}
      		}
    	}
	}

	class RtfState{
		
		public function __construct(){
			$this->Reset();
		}

		public function Reset(){
			$this->bold = false;
			$this->italic = false;
			$this->underline = false;
			$this->end_underline = false;
			$this->strike = false;
			$this->hidden = false;
			$this->fontsize = 0;
		}

	}

	class RtfHtml{
		public function Format($root){
			$this->output = "";
			// Create a stack of states:
			$this->states = array();
			// Put an initial standard state onto the stack:
			$this->state = new RtfState();
			array_push($this->states, $this->state);
			$this->FormatGroup($root);
			return $this->output;
		}
	
		protected function FormatGroup($group){
			// Can we ignore this group?
			if ($group->GetType() == "fonttbl") return;
			if ($group->GetType() == "colortbl") return;
			if ($group->GetType() == "stylesheet") return;
			if ($group->GetType() == "info") return;
			// Skip any pictures:
			if (substr($group->GetType(), 0, 4) == "pict") return;
			if ($group->IsDestination()) return;
	
			// Push a new state onto the stack:
			$this->state = clone $this->state;
			array_push($this->states, $this->state);
	
			foreach($group->children as $child){
				if(get_class($child) == "RtfGroup") $this->FormatGroup($child);
				if(get_class($child) == "RtfControlWord") $this->FormatControlWord($child);
				if(get_class($child) == "RtfControlSymbol") $this->FormatControlSymbol($child);
				if(get_class($child) == "RtfText") $this->FormatText($child);
			}
	
			// Pop state from stack.
			array_pop($this->states);
			$this->state = $this->states[sizeof($this->states)-1];
		}
	
		protected function FormatControlWord($word){
			if($word->word == "plain") $this->state->Reset();
			if($word->word == "b") $this->state->bold = $word->parameter;
			if($word->word == "i") $this->state->italic = $word->parameter;
			if($word->word == "ul") $this->state->underline = $word->parameter;
			if($word->word == "ulnone") $this->state->end_underline = $word->parameter;
			if($word->word == "strike") $this->state->strike = $word->parameter;
			if($word->word == "v") $this->state->hidden = $word->parameter;
			if($word->word == "fs") $this->state->fontsize = ceil(($word->parameter / 24) * 16);
	
			if($word->word == "par") $this->output .= "<p>";
	
			// Characters:
			if($word->word == "lquote") $this->output .= "&lsquo;";
			if($word->word == "rquote") $this->output .= "&rsquo;";
			if($word->word == "ldblquote") $this->output .= "&ldquo;";
			if($word->word == "rdblquote") $this->output .= "&rdquo;";
			if($word->word == "emdash") $this->output .= "&mdash;";
			if($word->word == "endash") $this->output .= "&ndash;";
			if($word->word == "bullet") $this->output .= "&bull;";
			if($word->word == "u") $this->output .= "&loz;";
		}
	
		protected function BeginState(){
			$span = "";
			if($this->state->bold) $span .= "font-weight:bold;";
			if($this->state->italic) $span .= "font-style:italic;";
			if($this->state->underline) $span .= "text-decoration:underline;";
			if($this->state->end_underline) $span .= "text-decoration:none;";
			if($this->state->strike) $span .= "text-decoration:strikethrough;";
			if($this->state->hidden) $span .= "display:none;";
			if($this->state->fontsize != 0) $span .= "font-size: {$this->state->fontsize}px;";
			$this->output .= "<span style='{$span}'>";
		}
	
		protected function EndState(){
			$this->output .= "</span>";
		}
	
		protected function FormatControlSymbol($symbol){
			if($symbol->symbol == '\''){
				$this->BeginState();
				$this->output .= htmlentities(chr($symbol->parameter), ENT_QUOTES, 'ISO-8859-1');
				$this->EndState();
			}
		}
	
		protected function FormatText($text){
			$this->BeginState();
			$this->output .= $text->text;
			$this->EndState();
		}
		
	}
?>