Vue.component('filter-container', {
  props: ['title', 'filters'],
  data: function () {
    return {
      count: 0
    };
  },
  template: `
    <article class="filter-container container">
        <header class="row by-click-changable"><p class="title col-6">{{ title }}</p>
            <div class="collapser col-6">
                <div class="link-type-c by-click-changable">collapse</div>
            </div>
        </header>
        <section class="main row">
            <div class="col-6 filter-button" v-for="filter in filters">
                <div class="button-type-a by-click-changable">
                    {{ filter.name }}
                    <div class="close-x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAWUlEQVQoU3WO0Q2AMAhE301mR6mTaTfRyTA0tGlJ5AuOB3cyswockk6Wmno0F3APaNGa/GiFgBfwgyapdiBBPvalN3/AtMsWDXjCokPaAsXbLXgMZXimTOUDrCI6e4MWoJYAAAAASUVORK5CYII="/></div>
                </div>
            </div>
        </section>
    </article>
  `
});


new Vue({ el: '#app' })
