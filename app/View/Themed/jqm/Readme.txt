Readme.txt

Under this folder is during development.
Currently, STEP1


I have making ​​for smart phones, the view.
Using jquery mobile.


SETP1
Only html.css.javascript, to create a mock-up.

STEP2
the incorporation of cakephp, as the theme.
also be installed switching link of mobile and PC.


Add AppController
function beforeFilter() {
	if($this->request->is('mobile')){
		$this->theme = 'Jqm';
		$this->layout = 'jqm';
	}
}



2014/07/30 add
not created ​​to make book page.