<!-- search feature begins -->
 <div class="search-overlay search-overlay--visible">
  <div class="search-overlay-top shadow-sm" 
     style="position: relative; top: 10%; left: 50%; transform: translateX(-50%); width: 100%; max-width: 600px; font-size: 22px; background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
  <label for="live-search-field" class="search-overlay-icon">
    <i class="fas fa-search"></i>
  </label>
  <input type="text" id="live-search-field" class="live-search-field" 
         style="width: 100%; padding: 15px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ced4da;" 
         placeholder="Search for users...">
  <span class="close-live-search">
    <i class="fas fa-times-circle"></i>
  </span>
 </div>


  <div class="search-overlay-bottom">
    <div class="container container--narrow py-3">
      <div class="circle-loader d-none" id="loader"></div>
      <div class="live-search-results d-none"  id="search-results">
        <div class="list-group shadow-sm" id="results-list">
          <!-- Results will be injected here -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- search feature end -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchField = document.getElementById('live-search-field');
  const resultsBox = document.getElementById('search-results');
  const resultsList = document.getElementById('results-list');
  const loader = document.getElementById('loader');

  let debounceTimeout;

  searchField.addEventListener('input', function () {
    const query = this.value.trim();

    clearTimeout(debounceTimeout);

    if (query.length > 0) {
      loader.classList.remove('d-none');
      debounceTimeout = setTimeout(() => {
        fetch(`/search-users?q=${encodeURIComponent(query)}`)
          .then(response => response.json())
          .then(data => {
            loader.classList.add('d-none');
            resultsList.innerHTML = '';

            if (data.length > 0) {
              resultsBox.classList.remove('d-none');

              data.forEach(user => {
                resultsList.innerHTML += `
                  <div class="card mb-3" style="border: 1px solid #dee2e6; border-radius: 8px; padding: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="text-center">
                      <img src="https://gravatar.com/avatar/${md5(user.email)}?s=100" alt="Avatar" style="max-width: 40px; border-radius: 50%; margin-bottom: 3px;">
                      <h5 class="mt-3">${user.name}</h5>
                      <hr style="margin: 3px 0; border-top: 1px solid #dee2e6;">
                      <p>Email: ${user.email}</p>
                    </div>
                  </div>
                `;
              });
            } else {
              resultsList.innerHTML = '<div class="list-group-item text-center">No users found.</div>';
              resultsBox.classList.remove('d-none');
            }
          });
      }, 300); // debounce delay
    } else {
      resultsBox.classList.add('d-none');
      loader.classList.add('d-none');
    }
  });
});

// Simple MD5 hash function for Gravatar (optional, if you're using avatars)
function md5(string) {
  return CryptoJS.MD5(string.trim().toLowerCase()).toString();
}
</script>

<!-- include CryptoJS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
