
class ModuleExemple {
  constructor () {
    this.init();
  }

  init () {
    this.events();
    this.defualtLoad();
  }

  events () {
    console.log('events');
  }

  defualtLoad () {
    console.log('defualtLoad');
  }
}

var moduleExemple = new ModuleExemple;