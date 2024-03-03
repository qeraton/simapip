(function(global, $) {

    if (typeof $ === 'undefined') {
      throwError('Pagination requires jQuery.');
    }
  
    var pluginName = 'pagination';
  
    var pluginHookMethod = 'addHook';
  
    var eventPrefix = '__pagination-';
  
    // Konflik, buat cadangan
    if ($.fn.pagination) {
      pluginName = 'pagination2';
    }
  
    $.fn[pluginName] = function(options) {
  
      if (typeof options === 'undefined') {
        return this;
      }
  
      var container = $(this);
  
      var attributes = $.extend({}, $.fn[pluginName].defaults, options);
  
      var pagination = {
  
        initialize: function() {
          var self = this;
  
          if (!container.data('pagination')) {
            container.data('pagination', {});
          }
  
          if (self.callHook('beforeInit') === false) return;
  
          if (container.data('pagination').initialized) {
            $('.qatpagination', container).remove();
          }
  
          self.disabled = !!attributes.disabled;
  
          var model = self.model = {
            pageRange: attributes.pageRange,
            pageSize: attributes.pageSize
          };
  
          self.parseDataSource(attributes.dataSource, function(dataSource) {
            self.isAsync = Helpers.isString(dataSource);
            if (Helpers.isArray(dataSource)) {
              model.totalNumber = attributes.totalNumber = dataSource.length;
            }
  
            self.isDynamicTotalNumber = self.isAsync && attributes.totalNumberLocator;
  
            var el = self.render(true);
  
              if (attributes.className) {
              el.addClass(attributes.className);
            }
  
            model.el = el;
  
            container[attributes.position === 'bottom' ? 'append' : 'prepend'](el);
  
            self.observer();
  
            container.data('pagination').initialized = true;
  
            self.callHook('afterInit', el);
          });
        },
  
        render: function(isBoot) {
          var self = this;
          var model = self.model;
          var el = model.el || $('<div class="qatpagination btn-toolbar"></div>');
          var isForced = isBoot !== true;
  
          self.callHook('beforeRender', isForced);
  
          var currentPage = model.pageNumber || attributes.pageNumber;
          var pageRange = attributes.pageRange || 0;
          var totalPage = self.getTotalPage();
  
          var rangeStart = currentPage - pageRange;
          var rangeEnd = currentPage + pageRange;
  
          if (rangeEnd > totalPage) {
            rangeEnd = totalPage;
            rangeStart = totalPage - pageRange * 2;
            rangeStart = rangeStart < 1 ? 1 : rangeStart;
          }
  
          if (rangeStart <= 1) {
            rangeStart = 1;
            rangeEnd = Math.min(pageRange * 2 + 1, totalPage);
          }
  
          el.html(self.generateHTML({
            currentPage: currentPage,
            pageRange: pageRange,
            rangeStart: rangeStart,
            rangeEnd: rangeEnd
          }));
  
          if (attributes.hideWhenLessThanOnePage) {
            el[totalPage <= 1 ? 'hide' : 'show']();
          }
  
          self.callHook('afterRender', isForced);
  
          return el;
        },
  
        generatePageNumbersHTML: function(args) {
          var self = this;
          var currentPage = args.currentPage;
          var totalPage = self.getTotalPage();
          var rangeStart = args.rangeStart;
          var rangeEnd = args.rangeEnd;
          var html = '';
          var i;
  
          var pageLink = attributes.pageLink;
          var ellipsisText = attributes.ellipsisText;
  
          var classPrefix = attributes.classPrefix;
          var activeClassName = attributes.activeClassName;
          var disableClassName = attributes.disableClassName;
  
          if (attributes.pageRange === null) {
            for (i = 1; i <= totalPage; i++) {
              if (i == currentPage) {
                html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page ' + activeClassName + ' btn btn-primary" data-num="' + i + '"> ' + i + '<\/button>';
              } else {
                html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page btn btn-primary" data-num="' + i + '" data-url="' + pageLink + '"> ' + i + '<\/button>';
              }
            }
            return html;
          }
  
          if (rangeStart <= 3) {
            for (i = 1; i < rangeStart; i++) {
              if (i == currentPage) {
                html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page ' + activeClassName + ' btn btn-primary" data-num="' + i + '"> ' + i + '<\/button>';
              } else {
                html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page btn btn-primary" data-num="' + i + '" data-url="' + pageLink + '"> ' + i + '<\/button>';
              }
            }
          } else {
            if (attributes.showFirstOnEllipsisShow) {
              html += '<button type="button" class="' + classPrefix + '-page ' + classPrefix + '-first J-qatpagination-page btn btn-primary" data-url="' + pageLink + '" data-num="1">1<\/button>';
            }
            html += '<button type="button" class="' + classPrefix + '-ellipsis ' + disableClassName + ' btn btn-primary">' + ellipsisText + '<\/button>';
          }
  
          for (i = rangeStart; i <= rangeEnd; i++) {
            if (i == currentPage) {
              html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page ' + activeClassName + ' btn btn-primary" data-num="' + i + '"> ' + i + '<\/button>';
            } else {
              html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page btn btn-primary" data-num="' + i + '" data-url="' + pageLink + '"> ' + i + '<\/button>';
            }
          }
  
          if (rangeEnd >= totalPage - 2) {
            for (i = rangeEnd + 1; i <= totalPage; i++) {
              html += '<button type="button" class="' + classPrefix + '-page J-qatpagination-page btn btn-primary" data-url="' + pageLink + '" data-num="' + i + '">' + i + '<\/button>';
            }
          } else {
            html += '<button type="button" class="' + classPrefix + '-ellipsis ' + disableClassName + ' btn btn-primary">' + ellipsisText + '<\/button>';
  
            if (attributes.showLastOnEllipsisShow) {
              html += '<button type="button" class="' + classPrefix + '-page ' + classPrefix + '-last J-qatpagination-page btn btn-primary" data-url="' + pageLink + '" data-num="' + totalPage + '">' + totalPage + '<\/button>';
            }
          }
  
          return html;
        },
  
        generateHTML: function(args) {
          var self = this;
          var currentPage = args.currentPage;
          var totalPage = self.getTotalPage();
  
          var totalNumber = self.getTotalNumber();
  
          var showPrevious = attributes.showPrevious;
          var showNext = attributes.showNext;
          var showPageNumbers = attributes.showPageNumbers;
          var showNavigator = attributes.showNavigator;
          var showGoInput = attributes.showGoInput;
          var showGoButton = attributes.showGoButton;
  
          var pageLink = attributes.pageLink;
          var prevText = attributes.prevText;
          var nextText = attributes.nextText;
          var goButtonText = attributes.goButtonText;
  
          var classPrefix = attributes.classPrefix;
          var disableClassName = attributes.disableClassName;
          var ulClassName = attributes.ulClassName;
  
          var html = '';
          var goInput = '<input type="text" class="J-qatpagination-go-pagenumber">';
          var goButton = '<input type="button" class="J-qatpagination-go-button" value="' + goButtonText + '">';
          var formattedString;
  
          var formatNavigator = $.isFunction(attributes.formatNavigator) ? attributes.formatNavigator(currentPage, totalPage, totalNumber) : attributes.formatNavigator;
          var formatGoInput = $.isFunction(attributes.formatGoInput) ? attributes.formatGoInput(goInput, currentPage, totalPage, totalNumber) : attributes.formatGoInput;
          var formatGoButton = $.isFunction(attributes.formatGoButton) ? attributes.formatGoButton(goButton, currentPage, totalPage, totalNumber) : attributes.formatGoButton;
  
          var autoHidePrevious = $.isFunction(attributes.autoHidePrevious) ? attributes.autoHidePrevious() : attributes.autoHidePrevious;
          var autoHideNext = $.isFunction(attributes.autoHideNext) ? attributes.autoHideNext() : attributes.autoHideNext;
  
          var header = $.isFunction(attributes.header) ? attributes.header(currentPage, totalPage, totalNumber) : attributes.header;
          var footer = $.isFunction(attributes.footer) ? attributes.footer(currentPage, totalPage, totalNumber) : attributes.footer;

          if (header) {
            formattedString = self.replaceVariables(header, {
              currentPage: currentPage,
              totalPage: totalPage,
              totalNumber: totalNumber
            });
            html += formattedString;
          }
  
          if (showPrevious || showPageNumbers || showNext) {
            html += '<div class="qatpagination-pages btn-group btn-group-lg me-2 mb-2">';
  
            // if (ulClassName) {
            //   html += '<div class="' + ulClassName + ' btn-group btn-group-lg me-2 mb-2">';
            // } else {
            //   html += '<div>';
            // }
  
            if (showPrevious) {
              if (currentPage <= 1) {
                if (!autoHidePrevious) {
                  html += '<button type="button" class="' + classPrefix + '-prev ' + disableClassName + ' btn btn-primary"> ' + prevText + '<\/button>';
                }
              } else {
                html += '<button type="button" class="' + classPrefix + '-prev J-qatpagination-previous btn btn-primary" data-num="' + (currentPage - 1) + '" title="Previous page" data-url="' + pageLink + '">' + prevText + '<\/button>';
              }
            }
  
            if (showPageNumbers) {
              html += self.generatePageNumbersHTML(args);
            }
  
            if (showNext) {
              if (currentPage >= totalPage) {
                if (!autoHideNext) {
                  html += '<button type="button" class="' + classPrefix + '-next ' + disableClassName + ' btn btn-primary"> ' + nextText + '<\/button>';
                }
              } else {
                html += '<button type="button" class="' + classPrefix + '-prev J-qatpagination-next btn btn-primary" data-num="' + (currentPage + 1) + '" title="Previous page" data-url="' + pageLink + '">' + nextText + '<\/button>';
              }
            }
            html += '<\/div>';//<\/div>
          }
  
          if (showNavigator) {
            if (formatNavigator) {
              formattedString = self.replaceVariables(formatNavigator, {
                currentPage: currentPage,
                totalPage: totalPage,
                totalNumber: totalNumber
              });
              html += '<div class="' + classPrefix + '-nav J-qatpagination-nav">' + formattedString + '<\/div>';
            }
          }
  
          if (showGoInput) {
            if (formatGoInput) {
              formattedString = self.replaceVariables(formatGoInput, {
                currentPage: currentPage,
                totalPage: totalPage,
                totalNumber: totalNumber,
                input: goInput
              });
              html += '<div class="' + classPrefix + '-go-input">' + formattedString + '</div>';
            }
          }
  
          if (showGoButton) {
            if (formatGoButton) {
              formattedString = self.replaceVariables(formatGoButton, {
                currentPage: currentPage,
                totalPage: totalPage,
                totalNumber: totalNumber,
                button: goButton
              });
              html += '<div class="' + classPrefix + '-go-button">' + formattedString + '</div>';
            }
          }
  
          if (footer) {
            formattedString = self.replaceVariables(footer, {
              currentPage: currentPage,
              totalPage: totalPage,
              totalNumber: totalNumber
            });
            html += formattedString;
          }
  
          return html;
        },
  
        findTotalNumberFromRemoteResponse: function(response) {
          var self = this;
          self.model.totalNumber = attributes.totalNumberLocator(response);
        },
  
        go: function(number, callback) {
          var self = this;
          var model = self.model;
  
          if (self.disabled) return;
  
          var pageNumber = number;
          pageNumber = parseInt(pageNumber);
  
          if (!pageNumber || pageNumber < 1) return;
  
          var pageSize = attributes.pageSize;
          var totalNumber = self.getTotalNumber();
          var totalPage = self.getTotalPage();
  
          if (totalNumber > 0) {
            if (pageNumber > totalPage) return;
          }
  
          if (!self.isAsync) {
            render(self.getDataFragment(pageNumber));
            return;
          }
  
          var postData = {};
          var alias = attributes.alias || {};
          postData[alias.pageSize ? alias.pageSize : 'pageSize'] = pageSize;
          postData[alias.pageNumber ? alias.pageNumber : 'pageNumber'] = pageNumber;
  
          var ajaxParams = $.isFunction(attributes.ajax) ? attributes.ajax() : attributes.ajax;
          var formatAjaxParams = {
            type: 'get',
            cache: false,
            data: {},
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            async: true
          };
  
          $.extend(true, formatAjaxParams, ajaxParams);
          $.extend(formatAjaxParams.data, postData);
  
          formatAjaxParams.url = attributes.dataSource;
          formatAjaxParams.success = function(response) {
            if (self.isDynamicTotalNumber) {
              self.findTotalNumberFromRemoteResponse(response);
            } else {
              self.model.totalNumber = attributes.totalNumber;
            }
  
            var finalData = self.filterDataByLocator(response);
            render(finalData);
          };
          formatAjaxParams.error = function(jqXHR, textStatus, errorThrown) {
            attributes.formatAjaxError && attributes.formatAjaxError(jqXHR, textStatus, errorThrown);
            self.enable();
          };
  
          self.disable();
  
          $.ajax(formatAjaxParams);
  
          function render(data) {
            if (self.callHook('beforePaging', pageNumber) === false) return false;
  
            model.direction = typeof model.pageNumber === 'undefined' ? 0 : (pageNumber > model.pageNumber ? 1 : -1);
  
            model.pageNumber = pageNumber;
  
            self.render();
  
            if (self.disabled && self.isAsync) {
              self.enable();
            }
  
            container.data('pagination').model = model;
  
            if (attributes.formatResult) {
              var cloneData = $.extend(true, [], data);
              if (!Helpers.isArray(data = attributes.formatResult(cloneData))) {
                data = cloneData;
              }
            }
  
            container.data('pagination').currentPageData = data;
  
            self.doCallback(data, callback);
  
            self.callHook('afterPaging', pageNumber);
  
            if (pageNumber == 1) {
              self.callHook('afterIsFirstPage');
            }
  
            if (pageNumber == self.getTotalPage()) {
              self.callHook('afterIsLastPage');
            }
          }
        },
  
        doCallback: function(data, customCallback) {
          var self = this;
          var model = self.model;
  
          if ($.isFunction(customCallback)) {
            customCallback(data, model);
          } else if ($.isFunction(attributes.callback)) {
            attributes.callback(data, model);
          }
        },
  
        destroy: function() {
          if (this.callHook('beforeDestroy') === false) return;
  
          this.model.el.remove();
          container.off();
  
          $('#qatpagination-style').remove();
  
          this.callHook('afterDestroy');
        },
  
        previous: function(callback) {
          this.go(this.model.pageNumber - 1, callback);
        },
  
        next: function(callback) {
          this.go(this.model.pageNumber + 1, callback);
        },
  
        disable: function() {
          var self = this;
          var source = self.isAsync ? 'async' : 'sync';
  
          if (self.callHook('beforeDisable', source) === false) return;
  
          self.disabled = true;
          self.model.disabled = true;
  
          self.callHook('afterDisable', source);
        },
  
        enable: function() {
          var self = this;
          var source = self.isAsync ? 'async' : 'sync';
  
          if (self.callHook('beforeEnable', source) === false) return;
  
          self.disabled = false;
          self.model.disabled = false;
  
          self.callHook('afterEnable', source);
        },
  
        refresh: function(callback) {
          this.go(this.model.pageNumber, callback);
        },
  
        show: function() {
          var self = this;
  
          if (self.model.el.is(':visible')) return;
  
          self.model.el.show();
        },
  
        hide: function() {
          var self = this;
  
          if (!self.model.el.is(':visible')) return;
  
          self.model.el.hide();
        },
  
        replaceVariables: function(template, variables) {
          var formattedString;
  
          for (var key in variables) {
            var value = variables[key];
            var regexp = new RegExp('<%=\\s*' + key + '\\s*%>', 'img');
  
            formattedString = (formattedString || template).replace(regexp, value);
          }
  
          return formattedString;
        },
  
        getDataFragment: function(number) {
          var pageSize = attributes.pageSize;
          var dataSource = attributes.dataSource;
          var totalNumber = this.getTotalNumber();
  
          var start = pageSize * (number - 1) + 1;
          var end = Math.min(number * pageSize, totalNumber);
  
          return dataSource.slice(start - 1, end);
        },
  
        getTotalNumber: function() {
          return this.model.totalNumber || attributes.totalNumber || 0;
        },
  
        getTotalPage: function() {
          return Math.ceil(this.getTotalNumber() / attributes.pageSize);
        },
  
        getLocator: function(locator) {
          var result;
  
          if (typeof locator === 'string') {
            result = locator;
          } else if ($.isFunction(locator)) {
            result = locator();
          } else {
            throwError('"locator" is incorrect. (String | Function)');
          }
  
          return result;
        },
  
        filterDataByLocator: function(dataSource) {
          var locator = this.getLocator(attributes.locator);
          var filteredData;
  
          if (Helpers.isObject(dataSource)) {
            try {
              $.each(locator.split('.'), function(index, item) {
                filteredData = (filteredData ? filteredData : dataSource)[item];
              });
            }
            catch (e) {
            }
  
            if (!filteredData) {
              throwError('dataSource.' + locator + ' is undefined.');
            } else if (!Helpers.isArray(filteredData)) {
              throwError('dataSource.' + locator + ' must be an Array.');
            }
          }
  
          return filteredData || dataSource;
        },
  
        parseDataSource: function(dataSource, callback) {
          var self = this;
  
          if (Helpers.isObject(dataSource)) {
            callback(attributes.dataSource = self.filterDataByLocator(dataSource));
          } else if (Helpers.isArray(dataSource)) {
            callback(attributes.dataSource = dataSource);
          } else if ($.isFunction(dataSource)) {
            attributes.dataSource(function(data) {
              if (!Helpers.isArray(data)) {
                throwError('The parameter of "done" Function should be an Array.');
              }
              self.parseDataSource.call(self, data, callback);
            });
          } else if (typeof dataSource === 'string') {
            if (/^https?|file:/.test(dataSource)) {
              attributes.ajaxDataType = 'jsonp';
            }
            callback(dataSource);
          } else {
            throwError('Unexpected type of "dataSource".');
          }
        },
  
        callHook: function(hook) {
          var paginationData = container.data('pagination');
          var result;
  
          var args = Array.prototype.slice.apply(arguments);
          args.shift();
  
          if (attributes[hook] && $.isFunction(attributes[hook])) {
            if (attributes[hook].apply(global, args) === false) {
              result = false;
            }
          }
  
          if (paginationData.hooks && paginationData.hooks[hook]) {
            $.each(paginationData.hooks[hook], function(index, item) {
              if (item.apply(global, args) === false) {
                result = false;
              }
            });
          }
  
          return result !== false;
        },
  
        observer: function() {
          var self = this;
          var el = self.model.el;
  
          container.on(eventPrefix + 'go', function(event, pageNumber, done) {
            pageNumber = parseInt($.trim(pageNumber));
  
            if (!pageNumber) return;
  
            if (!$.isNumeric(pageNumber)) {
              throwError('"pageNumber" is incorrect. (Number)');
            }
  
            self.go(pageNumber, done);
          });
  
          el.delegate('.J-qatpagination-page', 'click', function(event) {
            var current = $(event.currentTarget);
            var pageNumber = $.trim(current.attr('data-num'));
  
            if (!pageNumber || current.hasClass(attributes.disableClassName) || current.hasClass(attributes.activeClassName)) return;
  
            if (self.callHook('beforePageOnClick', event, pageNumber) === false) return false;
  
            self.go(pageNumber);
  
            self.callHook('afterPageOnClick', event, pageNumber);
  
            if (!attributes.pageLink) return false;
          });
  
          el.delegate('.J-qatpagination-previous', 'click', function(event) {
            var current = $(event.currentTarget);
            var pageNumber = $.trim(current.attr('data-num'));
  
            if (!pageNumber || current.hasClass(attributes.disableClassName)) return;
  
            if (self.callHook('beforePreviousOnClick', event, pageNumber) === false) return false;
  
            self.go(pageNumber);
  
            self.callHook('afterPreviousOnClick', event, pageNumber);
  
            if (!attributes.pageLink) return false;
          });
  
          el.delegate('.J-qatpagination-next', 'click', function(event) {
            var current = $(event.currentTarget);
            var pageNumber = $.trim(current.attr('data-num'));
  
            if (!pageNumber || current.hasClass(attributes.disableClassName)) return;
  
            if (self.callHook('beforeNextOnClick', event, pageNumber) === false) return false;
  
            self.go(pageNumber);
  
            self.callHook('afterNextOnClick', event, pageNumber);
  
            if (!attributes.pageLink) return false;
          });
  
          el.delegate('.J-qatpagination-go-button', 'click', function(event) {
            var pageNumber = $('.J-qatpagination-go-pagenumber', el).val();
  
            if (self.callHook('beforeGoButtonOnClick', event, pageNumber) === false) return false;
  
            container.trigger(eventPrefix + 'go', pageNumber);
  
            self.callHook('afterGoButtonOnClick', event, pageNumber);
          });
  
          el.delegate('.J-qatpagination-go-pagenumber', 'keyup', function(event) {
            if (event.which === 13) {
              var pageNumber = $(event.currentTarget).val();
  
              if (self.callHook('beforeGoInputOnEnter', event, pageNumber) === false) return false;
  
              container.trigger(eventPrefix + 'go', pageNumber);
  
              $('.J-qatpagination-go-pagenumber', el).focus();
  
              self.callHook('afterGoInputOnEnter', event, pageNumber);
            }
          });
  
          container.on(eventPrefix + 'previous', function(event, done) {
            self.previous(done);
          });
  
          container.on(eventPrefix + 'next', function(event, done) {
            self.next(done);
          });
  
          container.on(eventPrefix + 'disable', function() {
            self.disable();
          });
  
          container.on(eventPrefix + 'enable', function() {
            self.enable();
          });
  
          container.on(eventPrefix + 'refresh', function(event, done) {
            self.refresh(done);
          });
  
          container.on(eventPrefix + 'show', function() {
            self.show();
          });
  
          container.on(eventPrefix + 'hide', function() {
            self.hide();
          });
  
          container.on(eventPrefix + 'destroy', function() {
            self.destroy();
          });
  
          var validTotalPage = Math.max(self.getTotalPage(), 1)
          var defaultPageNumber = attributes.pageNumber;
          
          if (self.isDynamicTotalNumber) {
            defaultPageNumber = 1;
          }
          if (attributes.triggerPagingOnInit) {
            container.trigger(eventPrefix + 'go', Math.min(defaultPageNumber, validTotalPage));
          }
        }
      };
  
      if (container.data('pagination') && container.data('pagination').initialized === true) {
        if ($.isNumeric(options)) {
          container.trigger.call(this, eventPrefix + 'go', options, arguments[1]);
          return this;
        } else if (typeof options === 'string') {
          var args = Array.prototype.slice.apply(arguments);
          args[0] = eventPrefix + args[0];
  
          switch (options) {
            case 'previous':
            case 'next':
            case 'go':
            case 'disable':
            case 'enable':
            case 'refresh':
            case 'show':
            case 'hide':
            case 'destroy':
              container.trigger.apply(this, args);
              break;
            case 'getSelectedPageNum':
              if (container.data('pagination').model) {
                return container.data('pagination').model.pageNumber;
              } else {
                return container.data('pagination').attributes.pageNumber;
              }
            case 'getTotalPage':
              return Math.ceil(container.data('pagination').model.totalNumber / container.data('pagination').model.pageSize);
            case 'getSelectedPageData':
              return container.data('pagination').currentPageData;
            case 'isDisabled':
              return container.data('pagination').model.disabled === true;
            default:
              throwError('Unknown action: ' + options);
          }
          return this;
        } else {
          uninstallPlugin(container);
        }
      } else {
        if (!Helpers.isObject(options)) throwError('Illegal options');
      }
  
      parameterChecker(attributes);
  
      pagination.initialize();
  
      return this;
    };
  
    $.fn[pluginName].defaults = {
  
      // Data source
      // Array | String | Function | Object
      //dataSource: '',
  
      // String | Function
      //locator: 'data',
  
      // Find totalNumber from remote response, the totalNumber will be ignored when totalNumberLocator is specified
      // Function
      //totalNumberLocator: function() {},
  
      // Total entries
      totalNumber: 0,
  
      // Default page
      pageNumber: 1,
  
      // entries of per page
      pageSize: 10,
  
      // Page range (pages on both sides of the current page)
      pageRange: 2,
  
      // Whether to display the 'Previous' button
      showPrevious: true,
  
      // Whether to display the 'Next' button
      showNext: true,
  
      // Whether to display the page buttons
      showPageNumbers: true,
  
      showNavigator: false,
  
      // Whether to display the 'Go' input
      showGoInput: false,
  
      // Whether to display the 'Go' button
      showGoButton: false,
  
      // Page link
      pageLink: '',
  
      // 'Previous' text
      prevText: '&laquo;',
  
      // 'Next' text
      nextText: '&raquo;',
  
      // Ellipsis text
      ellipsisText: '...',
  
      // 'Go' button text
      goButtonText: 'Go',
  
      // Additional className for Pagination element
      //className: '',
  
      classPrefix: 'qatpagination',
  
      // Default active class
      activeClassName: 'active',
  
      // Default disable class
      disableClassName: 'disabled',
  
      //ulClassName: '',
  
      // Whether to insert inline style
      inlineStyle: true,
  
      formatNavigator: '<%= currentPage %> / <%= totalPage %>',
  
      formatGoInput: '<%= input %>',
  
      formatGoButton: '<%= button %>',
  
      // Pagination element's position in the container
      position: 'bottom',
  
      // Auto hide previous button when current page is the first page
      autoHidePrevious: false,
  
      // Auto hide next button when current page is the last page
      autoHideNext: false,
  
      //header: '',
  
      //footer: '',
  
      // Aliases for custom pagination parameters
      //alias: {},
  
      // Whether to trigger pagination at initialization
      triggerPagingOnInit: true,
  
      // Whether to hide pagination when less than one page
      hideWhenLessThanOnePage: false,
  
      showFirstOnEllipsisShow: true,
  
      showLastOnEllipsisShow: true,
  
      // Pagination callback
      callback: function() {}
    };
  
    // Hook register
    $.fn[pluginHookMethod] = function(hook, callback) {
      if (arguments.length < 2) {
        throwError('Missing argument.');
      }
  
      if (!$.isFunction(callback)) {
        throwError('callback must be a function.');
      }
  
      var container = $(this);
      var paginationData = container.data('pagination');
  
      if (!paginationData) {
        container.data('pagination', {});
        paginationData = container.data('pagination');
      }
  
      !paginationData.hooks && (paginationData.hooks = {});
  
      //paginationData.hooks[hook] = callback;
      paginationData.hooks[hook] = paginationData.hooks[hook] || [];
      paginationData.hooks[hook].push(callback);
  
    };
  
    // Static method
    $[pluginName] = function(selector, options) {
      if (arguments.length < 2) {
        throwError('Requires two parameters.');
      }
  
      var container;
  
      // 'selector' is a jQuery object
      if (typeof selector !== 'string' && selector instanceof jQuery) {
        container = selector;
      } else {
        container = $(selector);
      }
  
      if (!container.length) return;
  
      container.pagination(options);
  
      return container;
    };
  
    // ============================================================
    // helpers
    // ============================================================
  
    var Helpers = {};
  
    // Throw error
    function throwError(content) {
      throw new Error('Pagination: ' + content);
    }
  
    // Check parameters
    function parameterChecker(args) {
      if (!args.dataSource) {
        throwError('"dataSource" is required.');
      }
  
      if (typeof args.dataSource === 'string') {
        if (args.totalNumberLocator === undefined) {
          if (args.totalNumber === undefined) {
            throwError('"totalNumber" is required.');
          } else if (!$.isNumeric(args.totalNumber)) {
            throwError('"totalNumber" is incorrect. (Number)');
          }
        } else {
          if (!$.isFunction(args.totalNumberLocator)) {
            throwError('"totalNumberLocator" should be a Function.');
          }
        }
      } else if (Helpers.isObject(args.dataSource)) {
        if (typeof args.locator === 'undefined') {
          throwError('"dataSource" is an Object, please specify "locator".');
        } else if (typeof args.locator !== 'string' && !$.isFunction(args.locator)) {
          throwError('' + args.locator + ' is incorrect. (String | Function)');
        }
      }
  
      if (args.formatResult !== undefined && !$.isFunction(args.formatResult)) {
        throwError('"formatResult" should be a Function.');
      }
    }
  
    // uninstall plugin
    function uninstallPlugin(target) {
      var events = ['go', 'previous', 'next', 'disable', 'enable', 'refresh', 'show', 'hide', 'destroy'];
  
      // off events of old instance
      $.each(events, function(index, value) {
        target.off(eventPrefix + value);
      });
  
      // reset pagination data
      target.data('pagination', {});
  
      // remove old
      $('.qatpagination', target).remove();
    }
  
    // Object type detection
    function getObjectType(object, tmp) {
      return ( (tmp = typeof(object)) == "object" ? object == null && "null" || Object.prototype.toString.call(object).slice(8, -1) : tmp ).toLowerCase();
    }
  
    $.each(['Object', 'Array', 'String'], function(index, name) {
      Helpers['is' + name] = function(object) {
        return getObjectType(object) === name.toLowerCase();
      };
    });
  
    /*
     * export via AMD or CommonJS
     * */
    if (typeof define === 'function' && define.amd) {
      define(function() {
        return $;
      });
    }
  
  })(this, window.jQuery);