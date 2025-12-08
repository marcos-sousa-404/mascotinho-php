// Auto-generated event handlers
(function() {
  'use strict';
  
  // Event handler functions
  const handlers = {
    'h0': function handleGoToHome() {
    return document.location.href = '/';
  },
    'h1': function handleClick(event) {
    var href = event.currentTarget.getAttribute('data-href');
    if (href && href.startsWith('#')) {
      event.preventDefault();
      var id = href.slice(1);
      var target = document.getElementById(id);
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth'
        });
      }
    } else if (href) {
      event.preventDefault();
      window.location.href = href;
    }
  },
    'h2': function handleToggleDrawer() {
    return setIsOpen(function (prev) {
      return !prev;
    });
  },
    'h3': function handleClick(event) {
    var href = event.currentTarget.getAttribute('data-href');
    if (href && href.startsWith('#')) {
      event.preventDefault();
      var id = href.slice(1);
      var target = document.getElementById(id);
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth'
        });
      }
    } else if (href) {
      event.preventDefault();
      window.location.href = href;
    }
  },
    'h4': function handleClick(event) {
    var href = event.currentTarget.getAttribute('data-href');
    if (href && href.startsWith('#')) {
      event.preventDefault();
      var id = href.slice(1);
      var target = document.getElementById(id);
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth'
        });
      }
    } else if (href) {
      event.preventDefault();
      window.location.href = href;
    }
  },
  };
  
  // Attach handlers when DOM is ready
  function attachHandlers() {
    // click handlers
    document.querySelectorAll('[data-event-click]').forEach(function(el) {
      const handlerId = el.getAttribute('data-event-click');
      if (handlers[handlerId]) {
        el.addEventListener('click', handlers[handlerId]);
      }
    });

  }
  
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', attachHandlers);
  } else {
    attachHandlers();
  }
})();
