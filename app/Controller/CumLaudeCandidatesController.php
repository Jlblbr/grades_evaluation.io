// app/Controller/CumLaudeCandidatesController.php

App::uses('AppController', 'Controller');

class CumLaudeCandidatesController extends AppController {

    public $uses = array('CumLaudeCandidate');

    public function index() {
        $cumLaudeCandidates = $this->CumLaudeCandidate->find('all');
        $this->set('cumLaudeCandidates', $cumLaudeCandidates);
    }
}
