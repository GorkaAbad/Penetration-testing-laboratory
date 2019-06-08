  <?php
  class FirstCest
  {
      public function logInpageWorks(AcceptanceTester $I)
      {
          $I->amOnPage('login.php');
          $I->see('Sign');
      }

    public function signUppageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('signup.php');
        $I->see('Sign');
    }
    public function indexpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('login.php');
        $I->fillField('inputEmail', 'gorka@gmail.com');
        $I->fillField('inputPassword', 'password');
        $I->click('Sign in');
        $I->see('Welcome back');
    }
    public function challengepageWorks1(AcceptanceTester $I)
    {
        $I->amOnPage('/index/index.php');
        $I->fillField('inputEmail', 'gorka@gmail.com');
        $I->fillField('inputPassword', 'password');
        $I->click('Sign in');
        $I->see('CVE-2014-6271');
        $I->amOnPage('/index/container.php?cve=CVE-2014-6271');
        $I->see('Exploit me!');
    }
    public function challengepageWorks2(AcceptanceTester $I)
    {
        $I->amOnPage('/index/index.php');
        $I->fillField('inputEmail', 'gorka@gmail.com');
        $I->fillField('inputPassword', 'password');
        $I->click('Sign in');
        $I->see('RainbowTables');
        $I->amOnPage('/index/container.php?cve=RainbowTables');
        $I->see('RainbowTables');
    }

    public function challengepageWorks3(AcceptanceTester $I)
    {
        $I->amOnPage('/index/index.php');
        $I->fillField('inputEmail', 'gorka@gmail.com');
        $I->fillField('inputPassword', 'password');
        $I->click('Sign in');
        $I->see('SQLInjection');
        $I->amOnPage('/index/container.php?cve=SQLInjection');
        $I->see('Exploit me!');
    }

    public function leaderboardpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/index/index.php');
        $I->fillField('inputEmail', 'gorka@gmail.com');
        $I->fillField('inputPassword', 'password');
        $I->click('Sign in');
        $I->see('Welcome back');
        $I->click('Leaderboard');
        $I->amOnPage('/index/leaderboard.php');
        $I->see('Points');
        $I->dontSee('Welcome back');

    }

    public function settingspageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/index/index.php');
        $I->fillField('inputEmail', 'gorka@gmail.com');
        $I->fillField('inputPassword', 'password');
        $I->click('Sign in');
        $I->see('Welcome back');
        $I->click('Settings');
        $I->amOnPage('/index/settings.php');
        $I->see('Change your password');
        $I->dontSee('Settings');

    }

}
